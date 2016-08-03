<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Settings/Master/Item/PokeballAttributes.php');

namespace POGOProtos\Settings\Master\Item {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // message POGOProtos.Settings.Master.Item.PokeballAttributes
  final class PokeballAttributes extends ProtobufMessage {

    private $_unknown;
    private $itemEffect = \POGOProtos\Enums\ItemEffect::ITEM_EFFECT_NONE; // optional .POGOProtos.Enums.ItemEffect item_effect = 1
    private $captureMulti = 0; // optional float capture_multi = 2
    private $captureMultiEffect = 0; // optional float capture_multi_effect = 3
    private $itemEffectMod = 0; // optional float item_effect_mod = 4

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
          case 1: // optional .POGOProtos.Enums.ItemEffect item_effect = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->itemEffect = $tmp;

            break;
          case 2: // optional float capture_multi = 2
            if($wire !== 5) {
              throw new \Exception("Incorrect wire format for field $field, expected: 5 got: $wire");
            }
            $tmp = Protobuf::read_float($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_float returned false');
            $this->captureMulti = $tmp;

            break;
          case 3: // optional float capture_multi_effect = 3
            if($wire !== 5) {
              throw new \Exception("Incorrect wire format for field $field, expected: 5 got: $wire");
            }
            $tmp = Protobuf::read_float($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_float returned false');
            $this->captureMultiEffect = $tmp;

            break;
          case 4: // optional float item_effect_mod = 4
            if($wire !== 5) {
              throw new \Exception("Incorrect wire format for field $field, expected: 5 got: $wire");
            }
            $tmp = Protobuf::read_float($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_float returned false');
            $this->itemEffectMod = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->itemEffect !== \POGOProtos\Enums\ItemEffect::ITEM_EFFECT_NONE) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->itemEffect);
      }
      if ($this->captureMulti !== 0) {
        fwrite($fp, "\x15", 1);
        Protobuf::write_float($fp, $this->captureMulti);
      }
      if ($this->captureMultiEffect !== 0) {
        fwrite($fp, "\x1d", 1);
        Protobuf::write_float($fp, $this->captureMultiEffect);
      }
      if ($this->itemEffectMod !== 0) {
        fwrite($fp, "%", 1);
        Protobuf::write_float($fp, $this->itemEffectMod);
      }
    }

    public function size() {
      $size = 0;
      if ($this->itemEffect !== \POGOProtos\Enums\ItemEffect::ITEM_EFFECT_NONE) {
        $size += 1 + Protobuf::size_varint($this->itemEffect);
      }
      if ($this->captureMulti !== 0) {
        $size += 5;
      }
      if ($this->captureMultiEffect !== 0) {
        $size += 5;
      }
      if ($this->itemEffectMod !== 0) {
        $size += 5;
      }
      return $size;
    }

    public function clearItemEffect() { $this->itemEffect = \POGOProtos\Enums\ItemEffect::ITEM_EFFECT_NONE; }
    public function getItemEffect() { return $this->itemEffect;}
    public function setItemEffect($value) { $this->itemEffect = $value; }

    public function clearCaptureMulti() { $this->captureMulti = 0; }
    public function getCaptureMulti() { return $this->captureMulti;}
    public function setCaptureMulti($value) { $this->captureMulti = $value; }

    public function clearCaptureMultiEffect() { $this->captureMultiEffect = 0; }
    public function getCaptureMultiEffect() { return $this->captureMultiEffect;}
    public function setCaptureMultiEffect($value) { $this->captureMultiEffect = $value; }

    public function clearItemEffectMod() { $this->itemEffectMod = 0; }
    public function getItemEffectMod() { return $this->itemEffectMod;}
    public function setItemEffectMod($value) { $this->itemEffectMod = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('item_effect', $this->itemEffect, \POGOProtos\Enums\ItemEffect::ITEM_EFFECT_NONE)
           . Protobuf::toString('capture_multi', $this->captureMulti, 0)
           . Protobuf::toString('capture_multi_effect', $this->captureMultiEffect, 0)
           . Protobuf::toString('item_effect_mod', $this->itemEffectMod, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Settings.Master.Item.PokeballAttributes)
  }

}