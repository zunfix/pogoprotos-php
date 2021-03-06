<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Data/Player/Currency.php');

namespace POGOProtos\Data\Player {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Data.Player.Currency
  final class Currency extends ProtobufMessage {

    private $_unknown;
    private $name = ""; // optional string name = 1
    private $amount = 0; // optional int32 amount = 2

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
          case 1: // optional string name = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->name = $tmp;

            break;
          case 2: // optional int32 amount = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->amount = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->name !== "") {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, strlen($this->name));
        fwrite($fp, $this->name);
      }
      if ($this->amount !== 0) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->amount);
      }
    }

    public function size() {
      $size = 0;
      if ($this->name !== "") {
        $l = strlen($this->name);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->amount !== 0) {
        $size += 1 + Protobuf::size_varint($this->amount);
      }
      return $size;
    }

    public function clearName() { $this->name = ""; }
    public function getName() { return $this->name;}
    public function setName($value) { $this->name = $value; }

    public function clearAmount() { $this->amount = 0; }
    public function getAmount() { return $this->amount;}
    public function setAmount($value) { $this->amount = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('name', $this->name, "")
           . Protobuf::toString('amount', $this->amount, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Data.Player.Currency)
  }

}