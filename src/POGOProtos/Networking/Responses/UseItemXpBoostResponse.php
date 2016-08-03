<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/UseItemXpBoostResponse.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // enum POGOProtos.Networking.Responses.UseItemXpBoostResponse.Result
  abstract class UseItemXpBoostResponse_Result extends ProtobufEnum {
    const UNSET = 0;
    const SUCCESS = 1;
    const ERROR_INVALID_ITEM_TYPE = 2;
    const ERROR_XP_BOOST_ALREADY_ACTIVE = 3;
    const ERROR_NO_ITEMS_REMAINING = 4;
    const ERROR_LOCATION_UNSET = 5;

    public static $_values = array(
      0 => "UNSET",
      1 => "SUCCESS",
      2 => "ERROR_INVALID_ITEM_TYPE",
      3 => "ERROR_XP_BOOST_ALREADY_ACTIVE",
      4 => "ERROR_NO_ITEMS_REMAINING",
      5 => "ERROR_LOCATION_UNSET",
    );

    public static function isValid($value) {
      return array_key_exists($value, self::$_values);
    }

    public static function toString($value) {
      checkArgument(is_int($value), 'value must be a integer');
      if (array_key_exists($value, self::$_values))
        return self::$_values[$value];
      return 'UNKNOWN';
    }
  }

  // message POGOProtos.Networking.Responses.UseItemXpBoostResponse
  final class UseItemXpBoostResponse extends ProtobufMessage {

    private $_unknown;
    private $result = \POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result::UNSET; // optional .POGOProtos.Networking.Responses.UseItemXpBoostResponse.Result result = 1
    private $appliedItems = null; // optional .POGOProtos.Inventory.AppliedItems applied_items = 2

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
          case 1: // optional .POGOProtos.Networking.Responses.UseItemXpBoostResponse.Result result = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->result = $tmp;

            break;
          case 2: // optional .POGOProtos.Inventory.AppliedItems applied_items = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->appliedItems = new \POGOProtos\Inventory\AppliedItems($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Inventory\AppliedItems did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->result !== \POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result::UNSET) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->result);
      }
      if ($this->appliedItems !== null) {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, $this->appliedItems->size());
        $this->appliedItems->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->result !== \POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result::UNSET) {
        $size += 1 + Protobuf::size_varint($this->result);
      }
      if ($this->appliedItems !== null) {
        $l = $this->appliedItems->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearResult() { $this->result = \POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result::UNSET; }
    public function getResult() { return $this->result;}
    public function setResult($value) { $this->result = $value; }

    public function clearAppliedItems() { $this->appliedItems = null; }
    public function getAppliedItems() { return $this->appliedItems;}
    public function setAppliedItems(\POGOProtos\Inventory\AppliedItems $value) { $this->appliedItems = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('result', $this->result, \POGOProtos\Networking\Responses\UseItemXpBoostResponse_Result::UNSET)
           . Protobuf::toString('applied_items', $this->appliedItems, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.UseItemXpBoostResponse)
  }

}