<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
      $class=get_class($exception);

      switch ($class) {
        case 'Illuminate\Auth\AuthenticationException':
        $guard=data_get($exception->guards(),0);
        switch ($guard) {
          case 'admin':
          $login="admin.login";
            break;

          case 'writer':
          $login="writer.login";
            break;

          case 'web':
            $login="login";
            break;

          default:
        $login="login";
            break;
        }
      return  redirect()->route($login);
          break;

      }
      if ($exception instanceof MethodNotAllowedHttpException)
       {
           abort(404);
       }

       if($exception instanceof NotFoundHttpException)
      {
          return response()->view('missing', [], 404);
      }
        return parent::render($request, $exception);
    }


}
