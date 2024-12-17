
<?php

class Networks {
    /**
     * Extract domain name from a given URL
     * 
     * Removes protocol (http/https) and www prefix, 
     * returns the base domain name
     * 
     * @param string $url Full URL or domain
     * @return string Extracted domain name
     */
    public function getDomainName($url) {
        // Remove http:// or https:// protocol
        $url = preg_replace('/https?:\/\//', '', $url);
        
        // Remove www. prefix
        $url = preg_replace('/^www\./', '', $url);
        
        // Split by / and return first part (domain)
        $parts = explode('/', $url);
        
        return $parts[0];
    }

    /**
     * Retrieve the visitor's IP address
     * 
     * Checks multiple server variables to get the client IP address
     * with a prioritized fallback mechanism
     * 
     * @return string|null Visitor's IP address or null if not found
     */
    public function visitorIpAddress() {
        // Check REMOTE_ADDR first (most reliable)
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return $this->sanitizeIpAddress($_SERVER['REMOTE_ADDR']);
        }
        
        // Check HTTP_CLIENT_IP
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $this->sanitizeIpAddress($_SERVER['HTTP_CLIENT_IP']);
        }
        
        // Check X-Forwarded-For header
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Parse multiple IPs from X-Forwarded-For (comma-separated)
            $forwardedIps = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            
            // Sanitize and return the first IP
            $firstIp = trim($forwardedIps[0]);
            return $this->sanitizeIpAddress($firstIp);
        }
        
        // No IP address found
        return null;
    }

    /**
     * Sanitize and validate IP address
     * 
     * Removes any potential malicious characters 
     * and validates the IP address format
     * 
     * @param string $ip Raw IP address
     * @return string|null Sanitized IP or null if invalid
     */
    private function sanitizeIpAddress($ip) {
        // Remove any non-IP characters
        $ip = preg_replace('/[^0-9a-fA-F:.]/', '', $ip);
        
        // Validate IP (both IPv4 and IPv6)
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return $ip;
        }
        
        return null;
    }

    /**
     * Advanced domain extraction with more comprehensive parsing
     * 
     * @param string $url Full URL or domain
     * @param bool $include_subdomains Whether to include subdomains
     * @return string Extracted domain name
     */
    public function getAdvancedDomainName($url, $include_subdomains = false) {
        // Remove protocol
        $url = preg_replace('/https?:\/\//', '', $url);
        
        // Remove www. prefix
        $url = preg_replace('/^www\./', '', $url);
        
        // Split by / and take first part
        $parts = explode('/', $url);
        $domain = $parts[0];
        
        // If subdomains are not wanted, extract main domain
        if (!$include_subdomains) {
            $domain_parts = explode('.', $domain);
            
            // Handle different TLD lengths
            $length = count($domain_parts);
            if ($length > 2) {
                $domain = $domain_parts[$length - 2] . '.' . $domain_parts[$length - 1];
            }
        }
        
        return $domain;
    }
}

?>
