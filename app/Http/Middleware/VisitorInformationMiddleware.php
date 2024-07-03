<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // For database interactions
use Jenssegers\Agent\Agent; // For device and browser information

class VisitorInformationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Gather visitor information
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        $urlParts = parse_url($request->url());
        $url = $urlParts['path'] ?? '/'; // Use path if available, otherwise default to '/'

        // Normalize URLs for blogs and services
        if (preg_match('#^/blogs#', $url)) {
            $url = '/blogs';
        } elseif (preg_match('#^/services#', $url)) {
            $url = '/services';
        }
        // Get device and browser information using Jenssegers/Agent
        $agent = new Agent();
        $device = $agent->device();
        if (!$device) {
            $device = 'Unknown'; // Or any other default value you prefer
        }
        $browser = $agent->browser();

        // Store visitor information in the database (optional)
        $allowedUrls = [
            '/', // Home page
            '/blogs',
            '/services',
            '/about',
            '/contact-us',
            '/privacy',
        ];

        if (in_array($url, $allowedUrls)) {
          try {
            DB::table('visitor_information')->insert([
                'ip' => $ip,
                'user_agent' => $userAgent,
                'url' => $url,
                'device' => $device,
                'browser' => $browser,
                'created_at' => now(),
            ]);
          } catch (\Throwable $th) {
            //throw $th;
          }
        }

        // Pass the request to the next middleware or controller
        return $next($request);
    }
}
