<?php

namespace App\Http\Middleware;

use App\Services\APageLinkValidator\APageLinkValidator;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateAPageLink
{

    public function __construct(private readonly APageLinkValidator $aPageLinkValidationService)
    { }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->route('uuid');

        if (!$this->aPageLinkValidationService->isValid($uuid)) {
            abort(404, 'Invalid or inactive link.');
        }

        return $next($request);
    }
}
