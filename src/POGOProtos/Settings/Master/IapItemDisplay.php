<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Settings/Master/IapItemDisplay.php');

namespace POGOProtos\Settings\Master {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;


  // message POGOProtos.Settings.Master.IapItemDisplay
  final class IapItemDisplay extends ProtobufMessage {

    private $_unknown;
    private $sku = ""; // optional string sku = 1
    private $category = \POGOProtos\Enums\HoloIapItemCategory::IAP_CATEGORY_NONE; // optional .POGOProtos.Enums.HoloIapItemCategory category = 2
    private $sortOrder = 0; // optional int32 sort_order = 3
    private $itemIds = array(); // repeated .POGOProtos.Inventory.Item.ItemId item_ids = 4
    private $counts = array(); // repeated int32 counts = 5

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
          case 1: // optional string sku = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->sku = $tmp;

            break;
          case 2: // optional .POGOProtos.Enums.HoloIapItemCategory category = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->category = $tmp;

            break;
          case 3: // optional int32 sort_order = 3
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_signed_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->sortOrder = $tmp;

            break;
          case 4: // repeated .POGOProtos.Inventory.Item.ItemId item_ids = 4
            if($wire !== 2 && $wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 or 0 got: $wire");
            }
            if ($wire === 0) {
              $tmp = Protobuf::read_varint($fp, $limit);
              if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
              $this->itemIds[] = $tmp;
            } elseif ($wire === 2) {
              $len = Protobuf::read_varint($fp, $limit);
              while ($len > 0) {
                $tmp = Protobuf::read_varint($fp, $len);
                if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
                $this->itemIds[] = $tmp;
              }
            }

            break;
          case 5: // repeated int32 counts = 5
            if($wire !== 2 && $wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 or 0 got: $wire");
            }
            if ($wire === 0) {
              $tmp = Protobuf::read_signed_varint($fp, $limit);
              if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
              if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->counts[] = $tmp;
            } elseif ($wire === 2) {
              $len = Protobuf::read_varint($fp, $limit);
              while ($len > 0) {
                $tmp = Protobuf::read_signed_varint($fp, $len);
                if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
                if ($tmp < Protobuf::MIN_INT32 || $tmp > Protobuf::MAX_INT32) throw new \Exception('int32 out of range');$this->counts[] = $tmp;
              }
            }

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->sku !== "") {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, strlen($this->sku));
        fwrite($fp, $this->sku);
      }
      if ($this->category !== \POGOProtos\Enums\HoloIapItemCategory::IAP_CATEGORY_NONE) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->category);
      }
      if ($this->sortOrder !== 0) {
        fwrite($fp, "\x18", 1);
        Protobuf::write_varint($fp, $this->sortOrder);
      }
      foreach($this->itemIds as $v) {
        fwrite($fp, " ", 1);
        Protobuf::write_varint($fp, $v);
      }
      foreach($this->counts as $v) {
        fwrite($fp, "(", 1);
        Protobuf::write_varint($fp, $v);
      }
    }

    public function size() {
      $size = 0;
      if ($this->sku !== "") {
        $l = strlen($this->sku);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->category !== \POGOProtos\Enums\HoloIapItemCategory::IAP_CATEGORY_NONE) {
        $size += 1 + Protobuf::size_varint($this->category);
      }
      if ($this->sortOrder !== 0) {
        $size += 1 + Protobuf::size_varint($this->sortOrder);
      }
      foreach($this->itemIds as $v) {
        $l = strlen($v);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      foreach($this->counts as $v) {
        $l = strlen($v);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearSku() { $this->sku = ""; }
    public function getSku() { return $this->sku;}
    public function setSku($value) { $this->sku = $value; }

    public function clearCategory() { $this->category = \POGOProtos\Enums\HoloIapItemCategory::IAP_CATEGORY_NONE; }
    public function getCategory() { return $this->category;}
    public function setCategory($value) { $this->category = $value; }

    public function clearSortOrder() { $this->sortOrder = 0; }
    public function getSortOrder() { return $this->sortOrder;}
    public function setSortOrder($value) { $this->sortOrder = $value; }

    public function clearItemIds() { $this->itemIds = array(); }
    public function getItemIdsCount() { return count($this->itemIds); }
    public function getItemIds($index) { return $this->itemIds[$index]; }
    public function getItemIdsArray() { return $this->itemIds; }
    public function setItemIds($index, array $value) {$this->itemIds[$index] = $value; }
    public function addItemIds(array $value) { $this->itemIds[] = $value; }
    public function addAllItemIds(array $values) { foreach($values as $value) {$this->itemIds[] = $value; }}

    public function clearCounts() { $this->counts = array(); }
    public function getCountsCount() { return count($this->counts); }
    public function getCounts($index) { return $this->counts[$index]; }
    public function getCountsArray() { return $this->counts; }
    public function setCounts($index, array $value) {$this->counts[$index] = $value; }
    public function addCounts(array $value) { $this->counts[] = $value; }
    public function addAllCounts(array $values) { foreach($values as $value) {$this->counts[] = $value; }}

    public function __toString() {
      return ''
           . Protobuf::toString('sku', $this->sku, "")
           . Protobuf::toString('category', $this->category, \POGOProtos\Enums\HoloIapItemCategory::IAP_CATEGORY_NONE)
           . Protobuf::toString('sort_order', $this->sortOrder, 0)
           . Protobuf::toString('item_ids', $this->itemIds, \POGOProtos\Inventory\Item\ItemId::ITEM_UNKNOWN)
           . Protobuf::toString('counts', $this->counts, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Settings.Master.IapItemDisplay)
  }

}