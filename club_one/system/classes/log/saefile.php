<?php defined('SYSPATH') or die('No direct script access.');
/**
 * File log writer. Writes out messages and stores them in a YYYY/MM directory.
 *
 * @package    Ninlands
 * @category   Logging
 * @author     shadow
 * @copyright  (c) 2011 shadow
 */
class Log_Saefile extends Log_Writer {
 
    /**
     * Creates a new file logger.
     * @return  void
     */
    public function __construct()
    {
    }
 
    /**
     * Writes each of the messages into SAE
     *     $writer->write($messages);
     *
     * @param   array   messages
     * @return  void
     */
    public function write(array $messages)
    {
 
        foreach ($messages as $message)
        {
            // Write each message into the log file
            // Format: time --- level: body
            sae_debug($message['time'].' --- '.$this->_log_levels[$message['level']].': '.$message['body'].PHP_EOL);
        }
    }
 
} // End Log_Saefile