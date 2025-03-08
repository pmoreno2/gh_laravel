<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        //web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Añadir esta línea para incluir las rutas de la API
        //commands: __DIR__.'/../routes/console.php',
        //health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if ($request->json()) {
                return response()->json(['message' => 'Not Found!'], 404);
            }
            throw $e;
        });

        $exceptions->render(function (ModelNotFoundException $e, $request) {
            if ($request->json()) {
                return response()->json(['message' => 'Resource not found!'], 404);
            }
            throw $e;
        });

        $exceptions->render(function (AuthenticationException $e, $request) {
            if ($request->json()) {
                return response()->json(['message' => 'Unauthenticated!'], 401);
            }
            throw $e;
        });

        $exceptions->render(function (ValidationException $e, $request) {
            if ($request->json()) {
                return response()->json(['message' => 'Validation failed!', 'errors' => $e->errors()], 422);
            }
            throw $e;
        });

        $exceptions->render(function (\Exception $e, $request) {
            if ($request->json()) {
                return response()->json(['message' => 'Server Error!'], 500);
            }
            throw $e;
        });
    })->create();