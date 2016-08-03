<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/SfidaActionLogResponse.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // enum POGOProtos.Networking.Responses.SfidaActionLogResponse.Result
  abstract class SfidaActionLogResponse_Result extends ProtobufEnum {
    const UNSET = 0;
    const SUCCESS = 1;

    public static $_values = array(
      0 => "UNSET",
      1 => "SUCCESS",
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

  // message POGOProtos.Networking.Responses.SfidaActionLogResponse
  final class SfidaActionLogResponse extends ProtobufMessage {

    private $_unknown;
    private $result = \POGOProtos\Networking\Responses\SfidaActionLogResponse_Result::UNSET; // optional .POGOProtos.Networking.Responses.SfidaActionLogResponse.Result result = 1
    private $logEntries = array(); // repeated .POGOProtos.Data.Logs.ActionLogEntry log_entries = 2

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
          case 1: // optional .POGOProtos.Networking.Responses.SfidaActionLogResponse.Result result = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->result = $tmp;

            break;
          case 2: // repeated .POGOProtos.Data.Logs.ActionLogEntry log_entries = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->logEntries[] = new \POGOProtos\Data\Logs\ActionLogEntry($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Logs\ActionLogEntry did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->result !== \POGOProtos\Networking\Responses\SfidaActionLogResponse_Result::UNSET) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->result);
      }
      foreach($this->logEntries as $v) {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, $v->size());
        $v->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->result !== \POGOProtos\Networking\Responses\SfidaActionLogResponse_Result::UNSET) {
        $size += 1 + Protobuf::size_varint($this->result);
      }
      foreach($this->logEntries as $v) {
        $l = $v->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearResult() { $this->result = \POGOProtos\Networking\Responses\SfidaActionLogResponse_Result::UNSET; }
    public function getResult() { return $this->result;}
    public function setResult($value) { $this->result = $value; }

    public function clearLogEntries() { $this->logEntries = array(); }
    public function getLogEntriesCount() { return count($this->logEntries); }
    public function getLogEntries($index) { return $this->logEntries[$index]; }
    public function getLogEntriesArray() { return $this->logEntries; }
    public function setLogEntries($index, array $value) {$this->logEntries[$index] = $value; }
    public function addLogEntries(array $value) { $this->logEntries[] = $value; }
    public function addAllLogEntries(array $values) { foreach($values as $value) {$this->logEntries[] = $value; }}

    public function __toString() {
      return ''
           . Protobuf::toString('result', $this->result, \POGOProtos\Networking\Responses\SfidaActionLogResponse_Result::UNSET)
           . Protobuf::toString('log_entries', $this->logEntries, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.SfidaActionLogResponse)
  }

}