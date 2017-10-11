<?php

/**
 * @file
 *
 * @package \Bookpro\SessionInterface
 */

 namespace Bookpro;

 /**
  * Interface SessionInterface
  */
interface SessionInterface
{
    /**
     * Create Session
     * 
     *  @return string|null should create session in page.
     */
    public static function getSession();

    
}
