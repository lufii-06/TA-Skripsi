<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pesan;
use Illuminate\Http\Request;
use App\Services\WhatsappSend;
use Illuminate\Support\Facades\Http;

class WaController extends Controller
{
    protected $whatsappSend;

    public function __construct(WhatsappSend $whatsappSend)
    {
        $this->whatsappSend = $whatsappSend;
    }
    public function sendWhatsAppMessage()
    {
        $pesanTerbaru = Pesan::latest()->first();
        $phoneNumber = '120363300440089351';
        $message = $pesanTerbaru->pesan;
        $params = [
            'url' => 'https://api.kirimwa.id/v1/messages',
            'token' => 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
            'method' => 'POST',
            'payload' => json_encode([
                'phone_number' => $phoneNumber,
                'message' => $message,
                'message_type' => 'text',
                'device_id' => 'admin',
                'is_group_message' => true
            ]),
        ];
        try {
            $response = $this->whatsappSend->apiKirimWaRequest($params);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('home')->with('error','Pesan tidak ditampilkan dalam grup wa');
        }
    }

    public function logout()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . 'vB0vX+pTsrNTXRRgK1HqzIlrYBDvf8LKiOqzvzaWQBpO4GpyRJgJwdgnakJAOu9o-luthfi',
            'method' => 'DELETE'
        ])->get('https://api.kirimwa.id/v1/devices/admin');
        return back();
    }
}
