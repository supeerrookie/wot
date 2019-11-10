<?php

namespace App\Http\Middleware;

use Closure;

class SecureHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];
    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy', 'no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        // $response->headers->set('Content-Security-Policy', "default-src 'self' 'unsafe-inline' https://staging.waveofromorrow.id; script-src 'self' data: https://staging.waveofromorrow.id; style-src 'self' 'unsafe-inline' https://staging.waveofromorrow.id; img-src 'self' 'unsafe-inline' data: https://staging.waveofromorrow.id; font-src 'self' data: https://staging.waveofromorrow.id; connect-src 'self' https://staging.waveofromorrow.id; media-src 'self' https://staging.waveofromorrow.id; object-src 'self' https://staging.waveofromorrow.id; prefetch-src 'self' https://staging.waveofromorrow.id; child-src 'self' https://staging.waveofromorrow.id; frame-src https://www.google.com; worker-src 'self'; sandbox allow-same-origin allow-scripts allow-popups;");
        return $response;
    }
    private function removeUnwantedHeaders($headerList)
    {
        foreach ($headerList as $header)
            header_remove($header);
    }
}
