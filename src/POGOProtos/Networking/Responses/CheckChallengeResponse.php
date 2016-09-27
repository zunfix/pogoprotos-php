<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Responses/CheckChallengeResponse.php');

namespace POGOProtos\Networking\Responses {

  use Protobuf;
  use ProtobufEnum;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Responses.CheckChallengeResponse
  final class CheckChallengeResponse extends ProtobufMessage {

    private $_unknown;
    private $showChallenge = false; // optional bool show_challenge = 1
    private $challengeUrl = ""; // optional string challenge_url = 2

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
          case 1: // optional bool show_challenge = 1
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            $this->showChallenge = ($tmp > 0) ? true : false;

            break;
          case 2: // optional string challenge_url = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->challengeUrl = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->showChallenge !== false) {
        fwrite($fp, "\x08", 1);
        Protobuf::write_varint($fp, $this->showChallenge ? 1 : 0);
      }
      if ($this->challengeUrl !== "") {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, strlen($this->challengeUrl));
        fwrite($fp, $this->challengeUrl);
      }
    }

    public function size() {
      $size = 0;
      if ($this->showChallenge !== false) {
        $size += 2;
      }
      if ($this->challengeUrl !== "") {
        $l = strlen($this->challengeUrl);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearShowChallenge() { $this->showChallenge = false; }
    public function getShowChallenge() { return $this->showChallenge;}
    public function setShowChallenge($value) { $this->showChallenge = $value; }

    public function clearChallengeUrl() { $this->challengeUrl = ""; }
    public function getChallengeUrl() { return $this->challengeUrl;}
    public function setChallengeUrl($value) { $this->challengeUrl = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('show_challenge', $this->showChallenge, false)
           . Protobuf::toString('challenge_url', $this->challengeUrl, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Responses.CheckChallengeResponse)
  }

}