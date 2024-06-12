<?php

class Gets {
  /**
   * Retrieves the current user's IP address.
   *
   * This function attempts to retrieve the user's IP address using a prioritized order
   * of server variables:
   * 1. REMOTE_ADDR: This is the most common and reliable source for the user's IP.
   * 2. HTTP_CLIENT_IP: This is used for proxies that preserve the original client IP.
   * 3. HTTP_X_FORWARDED_FOR: This is used for load balancers that forward the client IP.
   *
   * It is important to note that user IP addresses can be spoofed, so consider this
   * information for informational purposes only and not for security-critical operations.
   *
   * @return string|null The user's IP address or null if not found.
   */
  public function getCurrentIpAddress(): ?string
  {
    if (isset($_SERVER['REMOTE_ADDR'])) {
      return $_SERVER['REMOTE_ADDR'];
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
      return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      // Parse multiple IPs from X-Forwarded-For (comma-separated)
      $forwardedIps = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
      return trim($forwardedIps[0]); // Return the first IP
    }
    // No IP address found
    return null; 
  }

  
}

?>
