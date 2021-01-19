<?php
  class File
  {
    public $filename = 'hack.txt';
    public $data = 'Hello HAO'; 
    function __destruct(){
      file_put_contents($this->filename, $this->data);
    }
  }