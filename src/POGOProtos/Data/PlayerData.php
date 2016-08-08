<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Data/PlayerData.php');

namespace POGOProtos\Data {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // message POGOProtos.Data.PlayerData
  final class PlayerData extends ProtobufMessage {

    private $_unknown;
    private $creationTimestampMs = 0; // optional int64 creation_timestamp_ms = 1
    private $username = ""; // optional string username = 2
    private $team = \POGOProtos\Enums\TeamColor::NEUTRAL; // optional .POGOProtos.Enums.TeamColor team = 5
    private $tutorialState = array(); // repeated .POGOProtos.Enums.TutorialState tutorial_state = 7 [packed = true]
    private $avatar = null; // optional .POGOProtos.Data.Player.PlayerAvatar avatar = 8
    private $maxPokemonStorage = 0; // optional int32 max_pokemon_storage = 9
    private $maxItemStorage = 0; // optional int32 max_item_storage = 10
    private $dailyBonus = null; // optional .POGOProtos.Data.Player.DailyBonus daily_bonus = 11
    private $equippedBadge = null; // optional .POGOProtos.Data.Player.EquippedBadge equipped_badge = 12
    private $contactSettings = null; // optional .POGOProtos.Data.Player.ContactSettings contact_settings = 13
    private $currencies = array(); // repeated .POGOProtos.Data.Player.Currency currencies = 14

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
          case 1: // optional int64 creation_timestamp_ms = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT64 || $tmp > Protobuf::MAX_INT64) throw new \Exception('int64 out of range');$this->creationTimestampMs = $tmp;

            break;
          case 2: // optional string username = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->username = $tmp;

            break;
          case 5: // optional .POGOProtos.Enums.TeamColor team = 5
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->team = $tmp;

            break;
          case 7: // repeated .POGOProtos.Enums.TutorialState tutorial_state = 7 [packed = true]
            if($wire !== 2 && $wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 or 0 got: $wire");
            }
            if ($wire === 0) {
              $tmp = Protobuf::read_varint($fp, $limit);
              if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
              $this->tutorialState[] = $tmp;
            } elseif ($wire === 2) {
              $len = Protobuf::read_varint($fp, $limit);
              while ($len > 0) {
                $tmp = Protobuf::read_varint($fp, $len);
                if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
                $this->tutorialState[] = $tmp;
              }
            }

            break;
          case 8: // optional .POGOProtos.Data.Player.PlayerAvatar avatar = 8
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->avatar = new \POGOProtos\Data\Player\PlayerAvatar($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\PlayerAvatar did not read the full length');

            break;
          case 9: // optional int32 max_pokemon_storage = 9
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->maxPokemonStorage = $tmp;

            break;
          case 10: // optional int32 max_item_storage = 10
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->maxItemStorage = $tmp;

            break;
          case 11: // optional .POGOProtos.Data.Player.DailyBonus daily_bonus = 11
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->dailyBonus = new \POGOProtos\Data\Player\DailyBonus($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\DailyBonus did not read the full length');

            break;
          case 12: // optional .POGOProtos.Data.Player.EquippedBadge equipped_badge = 12
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->equippedBadge = new \POGOProtos\Data\Player\EquippedBadge($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\EquippedBadge did not read the full length');

            break;
          case 13: // optional .POGOProtos.Data.Player.ContactSettings contact_settings = 13
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->contactSettings = new \POGOProtos\Data\Player\ContactSettings($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\ContactSettings did not read the full length');

            break;
          case 14: // repeated .POGOProtos.Data.Player.Currency currencies = 14
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $limit -= $len;
            $this->currencies[] = new \POGOProtos\Data\Player\Currency($fp, $len);
            if ($len !== 0) throw new \Exception('new \POGOProtos\Data\Player\Currency did not read the full length');

            break;
          case 15:
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');
            break;

          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
      $limit = 0;
    }

    public function write($fp) {
      if ($this->creationTimestampMs !== 0) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->creationTimestampMs);
      }
      if ($this->username !== "") {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, strlen($this->username));
        fwrite($fp, $this->username);
      }
      if ($this->team !== \POGOProtos\Enums\TeamColor::NEUTRAL) {
        fwrite($fp, "(", 1);
        Protobuf::write_varint($fp, $this->team);
      }
      foreach($this->tutorialState as $v) {
        fwrite($fp, "8", 1);
        Protobuf::write_varint($fp, $v);
      }
      if ($this->avatar !== null) {
        fwrite($fp, "B", 1);
        Protobuf::write_varint($fp, $this->avatar->size());
        $this->avatar->write($fp);
      }
      if ($this->maxPokemonStorage !== 0) {
        fwrite($fp, "H", 1);
        Protobuf::write_varint($fp, $this->maxPokemonStorage);
      }
      if ($this->maxItemStorage !== 0) {
        fwrite($fp, "P", 1);
        Protobuf::write_varint($fp, $this->maxItemStorage);
      }
      if ($this->dailyBonus !== null) {
        fwrite($fp, "Z", 1);
        Protobuf::write_varint($fp, $this->dailyBonus->size());
        $this->dailyBonus->write($fp);
      }
      if ($this->equippedBadge !== null) {
        fwrite($fp, "b", 1);
        Protobuf::write_varint($fp, $this->equippedBadge->size());
        $this->equippedBadge->write($fp);
      }
      if ($this->contactSettings !== null) {
        fwrite($fp, "j", 1);
        Protobuf::write_varint($fp, $this->contactSettings->size());
        $this->contactSettings->write($fp);
      }
      foreach($this->currencies as $v) {
        fwrite($fp, "r", 1);
        Protobuf::write_varint($fp, $v->size());
        $v->write($fp);
      }
    }

    public function size() {
      $size = 0;
      if ($this->creationTimestampMs !== 0) {
        $size += 1 + Protobuf::size_varint($this->creationTimestampMs);
      }
      if ($this->username !== "") {
        $l = strlen($this->username);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->team !== \POGOProtos\Enums\TeamColor::NEUTRAL) {
        $size += 1 + Protobuf::size_varint($this->team);
      }
      foreach($this->tutorialState as $v) {
        $l = strlen($v);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->avatar !== null) {
        $l = $this->avatar->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->maxPokemonStorage !== 0) {
        $size += 1 + Protobuf::size_varint($this->maxPokemonStorage);
      }
      if ($this->maxItemStorage !== 0) {
        $size += 1 + Protobuf::size_varint($this->maxItemStorage);
      }
      if ($this->dailyBonus !== null) {
        $l = $this->dailyBonus->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->equippedBadge !== null) {
        $l = $this->equippedBadge->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->contactSettings !== null) {
        $l = $this->contactSettings->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      foreach($this->currencies as $v) {
        $l = $v->size();
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearCreationTimestampMs() { $this->creationTimestampMs = 0; }
    public function getCreationTimestampMs() { return $this->creationTimestampMs;}
    public function setCreationTimestampMs($value) { $this->creationTimestampMs = $value; }

    public function clearUsername() { $this->username = ""; }
    public function getUsername() { return $this->username;}
    public function setUsername($value) { $this->username = $value; }

    public function clearTeam() { $this->team = \POGOProtos\Enums\TeamColor::NEUTRAL; }
    public function getTeam() { return $this->team;}
    public function setTeam($value) { $this->team = $value; }

    public function clearTutorialState() { $this->tutorialState = array(); }
    public function getTutorialStateCount() { return count($this->tutorialState); }
    public function getTutorialState($index) { return $this->tutorialState[$index]; }
    public function getTutorialStateArray() { return $this->tutorialState; }
    public function setTutorialState($index, array $value) {$this->tutorialState[$index] = $value; }
    public function addTutorialState(array $value) { $this->tutorialState[] = $value; }
    public function addAllTutorialState(array $values) { foreach($values as $value) {$this->tutorialState[] = $value; }}

    public function clearAvatar() { $this->avatar = null; }
    public function getAvatar() { return $this->avatar;}
    public function setAvatar(\POGOProtos\Data\Player\PlayerAvatar $value) { $this->avatar = $value; }

    public function clearMaxPokemonStorage() { $this->maxPokemonStorage = 0; }
    public function getMaxPokemonStorage() { return $this->maxPokemonStorage;}
    public function setMaxPokemonStorage($value) { $this->maxPokemonStorage = $value; }

    public function clearMaxItemStorage() { $this->maxItemStorage = 0; }
    public function getMaxItemStorage() { return $this->maxItemStorage;}
    public function setMaxItemStorage($value) { $this->maxItemStorage = $value; }

    public function clearDailyBonus() { $this->dailyBonus = null; }
    public function getDailyBonus() { return $this->dailyBonus;}
    public function setDailyBonus(\POGOProtos\Data\Player\DailyBonus $value) { $this->dailyBonus = $value; }

    public function clearEquippedBadge() { $this->equippedBadge = null; }
    public function getEquippedBadge() { return $this->equippedBadge;}
    public function setEquippedBadge(\POGOProtos\Data\Player\EquippedBadge $value) { $this->equippedBadge = $value; }

    public function clearContactSettings() { $this->contactSettings = null; }
    public function getContactSettings() { return $this->contactSettings;}
    public function setContactSettings(\POGOProtos\Data\Player\ContactSettings $value) { $this->contactSettings = $value; }

    public function clearCurrencies() { $this->currencies = array(); }
    public function getCurrenciesCount() { return count($this->currencies); }
    public function getCurrencies($index) { return $this->currencies[$index]; }
    public function getCurrenciesArray() { return $this->currencies; }
    public function setCurrencies($index, array $value) {$this->currencies[$index] = $value; }
    public function addCurrencies(array $value) { $this->currencies[] = $value; }
    public function addAllCurrencies(array $values) { foreach($values as $value) {$this->currencies[] = $value; }}

    public function __toString() {
      return ''
           . Protobuf::toString('creation_timestamp_ms', $this->creationTimestampMs, 0)
           . Protobuf::toString('username', $this->username, "")
           . Protobuf::toString('team', $this->team, \POGOProtos\Enums\TeamColor::NEUTRAL)
           . Protobuf::toString('tutorial_state', $this->tutorialState, \POGOProtos\Enums\TutorialState::LEGAL_SCREEN)
           . Protobuf::toString('avatar', $this->avatar, null)
           . Protobuf::toString('max_pokemon_storage', $this->maxPokemonStorage, 0)
           . Protobuf::toString('max_item_storage', $this->maxItemStorage, 0)
           . Protobuf::toString('daily_bonus', $this->dailyBonus, null)
           . Protobuf::toString('equipped_badge', $this->equippedBadge, null)
           . Protobuf::toString('contact_settings', $this->contactSettings, null)
           . Protobuf::toString('currencies', $this->currencies, null);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Data.PlayerData)
  }

}