<?php

namespace Markirovka\Signature;

use Exception;

class Signature
{
    private $cert;

    public function __construct(string $certHash)
    {
        $store = new \CPStore();
        $store->Open(CURRENT_USER_STORE, "my", STORE_OPEN_READ_ONLY);
        $certs = $store->get_Certificates();

        $certs = $certs->Find(CERTIFICATE_FIND_SHA1_HASH, $certHash, 0);
        $cert = $certs->Item(1);

        if (!$cert) {
            throw new Exception("Certificate not found");
        }

        $this->cert = $cert;
    }

    public function sign(array $data): string
    {
        $content = json_encode($data);
        $signer = new \CPSigner();
        $signer->set_Certificate($this->cert);

        $sd = new \CPSignedData();
        $sd->set_ContentEncoding(1);
        $sd->set_Content(base64_encode($content));
        $sm = $sd->SignCades($signer, CADES_BES, true, ENCODE_BASE64);
        $sm = preg_replace('/[\r\n]/', '', $sm);

        return $sm;
    }
}