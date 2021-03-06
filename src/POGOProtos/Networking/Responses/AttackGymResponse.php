<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/AttackGymResponse.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // enum POGOProtos.Networking.Responses.AttackGymResponse.Result
  abstract class AttackGymResponse_Result extends ProtobufEnum {
    const NONE = 0;
    const SUCCESS = 1;
    const ERROR_INVALID_ATTACK_ACTIONS = 2;
    const ERROR_NOT_IN_RANGE = 3;

    public static $_values = array(
      0 => "NONE",
      1 => "SUCCESS",
      2 => "ERROR_INVALID_ATTACK_ACTIONS",
      3 => "ERROR_NOT_IN_RANGE",
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

  // message POGOProtos.Networking.Responses.AttackGymResponse
  final class AttackGymResponse extends ProtobufMessage {

    private $_unknown;
    private $result = \POGOProtos\Networking\Responses\AttackGymResponse_Result::NONE; // optional .POGOProtos.Networking.Responses.AttackGymResponse.Result result = 1
    private $battleLog = null; // optional .POGOProtos.Data.Battle.BattleLog battle_log = 2
    private $battleId = ""; // optional string battle_id = 3
    private $activeDefender = null; // optional .POGOProtos.Data.Battle.BattlePokemonInfo active_defender = 4
    private $activeAttacker = null; // optional .POGOProtos.Data.Battle.BattlePokemonInfo active_attacker = 5

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
          case 1: // optional .POGOProtos.Networking.Responses.AttackGymResponse.Result result = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->result = $tmp;

            break;
          case 2: // optional .POGOProtos.Data.Battle.BattleLog battle_log = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->battleLog = new \POGOProtos\Data\Battle\BattleLog($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Battle\BattleLog did not read the full length');

            break;
          case 3: // optional string battle_id = 3
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->battleId = $tmp;

            break;
          case 4: // optional .POGOProtos.Data.Battle.BattlePokemonInfo active_defender = 4
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->activeDefender = new \POGOProtos\Data\Battle\BattlePokemonInfo($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Battle\BattlePokemonInfo did not read the full length');

            break;
          case 5: // optional .POGOProtos.Data.Battle.BattlePokemonInfo active_attacker = 5
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->activeAttacker = new \POGOProtos\Data\Battle\BattlePokemonInfo($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Battle\BattlePokemonInfo did not read the full length');

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->result !== \POGOProtos\Networking\Responses\AttackGymResponse_Result::NONE) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->result);
      }
      if ($this->battleLog !== null) {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, $this->battleLog->size());
        $this->battleLog->write($fp);
      }
      if ($this->battleId !== "") {
        fwrite($fp, "\x1a", 1);
        Protobuf::write_varint($fp, strlen($this->battleId));
        fwrite($fp, $this->battleId);
      }
      if ($this->activeDefender !== null) {
        fwrite($fp, "\"", 1);
        Protobuf::write_varint($fp, $this->activeDefender->size());
        $this->activeDefender->write($fp);
      }
      if ($this->activeAttacker !== null) {
        fwrite($fp, "*", 1);
        Protobuf::write_varint($fp, $this->activeAttacker->size());
        $this->activeAttacker->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->result !== \POGOProtos\Networking\Responses\AttackGymResponse_Result::NONE) {
        $size += 1 + Protobuf::size_varint($this->result);
      }
      if ($this->battleLog !== null) {
        $l = $this->battleLog->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->battleId !== "") {
        $l = strlen($this->battleId);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->activeDefender !== null) {
        $l = $this->activeDefender->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->activeAttacker !== null) {
        $l = $this->activeAttacker->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearResult() { $this->result = \POGOProtos\Networking\Responses\AttackGymResponse_Result::NONE; }
    public function getResult() { return $this->result;}
    public function setResult($value) { $this->result = $value; }

    public function clearBattleLog() { $this->battleLog = null; }
    public function getBattleLog() { return $this->battleLog;}
    public function setBattleLog(\POGOProtos\Data\Battle\BattleLog $value) { $this->battleLog = $value; }

    public function clearBattleId() { $this->battleId = ""; }
    public function getBattleId() { return $this->battleId;}
    public function setBattleId($value) { $this->battleId = $value; }

    public function clearActiveDefender() { $this->activeDefender = null; }
    public function getActiveDefender() { return $this->activeDefender;}
    public function setActiveDefender(\POGOProtos\Data\Battle\BattlePokemonInfo $value) { $this->activeDefender = $value; }

    public function clearActiveAttacker() { $this->activeAttacker = null; }
    public function getActiveAttacker() { return $this->activeAttacker;}
    public function setActiveAttacker(\POGOProtos\Data\Battle\BattlePokemonInfo $value) { $this->activeAttacker = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('result', $this->result, \POGOProtos\Networking\Responses\AttackGymResponse_Result::NONE)
           . Protobuf::toString('battle_log', $this->battleLog, null)
           . Protobuf::toString('battle_id', $this->battleId, "")
           . Protobuf::toString('active_defender', $this->activeDefender, null)
           . Protobuf::toString('active_attacker', $this->activeAttacker, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.AttackGymResponse)
  }

}