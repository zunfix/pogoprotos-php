<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Platform/Requests/BuyItemAndroidRequest.php');

namespace POGOProtos\Networking\Platform\Requests {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Platform.Requests.BuyItemAndroidRequest
  final class BuyItemAndroidRequest extends ProtobufMessage {

    private $_unknown;
    private $buyItemIntent = ""; // optional string buy_item_intent = 1

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
          case 1: // optional string buy_item_intent = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->buyItemIntent = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->buyItemIntent !== "") {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, strlen($this->buyItemIntent));
        fwrite($fp, $this->buyItemIntent);
      }
    }

    public function size() {
      $size = 0;
      if ($this->buyItemIntent !== "") {
        $l = strlen($this->buyItemIntent);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearBuyItemIntent() { $this->buyItemIntent = ""; }
    public function getBuyItemIntent() { return $this->buyItemIntent;}
    public function setBuyItemIntent($value) { $this->buyItemIntent = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('buy_item_intent', $this->buyItemIntent, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Platform.Requests.BuyItemAndroidRequest)
  }

}