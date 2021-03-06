<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/CheckChallenge.php');

namespace POGOProtos\Networking\Requests\Messages {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Requests.Messages.CheckChallengeMessage
  final class CheckChallengeMessage extends ProtobufMessage {

    private $_unknown;
    private $debugRequest = false; // optional bool debug_request = 1

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional bool debug_request = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->debugRequest = ($tmp > 0) ? true : false;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->debugRequest !== false) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->debugRequest ? 1 : 0);
      }
    }

    public function size() {
      $size = 0;
      if ($this->debugRequest !== false) {
        $size += 2;
      }
      return $size;
    }

    public function clearDebugRequest() { $this->debugRequest = false; }
    public function getDebugRequest() { return $this->debugRequest;}
    public function setDebugRequest($value) { $this->debugRequest = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('debug_request', $this->debugRequest, false);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.CheckChallengeMessage)
  }

}