<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\JsonResponse;
// use Illuminate\Contracts\Mail\Mailable;


class BooksController extends Controller
{
    public function index(Request $request){

        return view('index');
    }
    public function store(Request $request)
    {
        
        // dd($request->all());
        $validatedData = $request->validate([
            'room_id' => 'required',
            'lodging_id' => 'required',
            'room_number' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'fullAddress' => 'required',
            'roomType' => 'required',
            'roomCount' => 'required',
            'adultCount' => 'nullable',
            'childCount' => 'nullable',
            // 'concerns' => 'nullable',
        ]);

         $books = Books::create([
            'room_id' => $validatedData['room_id'],
            'lodging_id' => $validatedData['lodging_id'],
            'room_number' => $validatedData['room_number'],
            'last_name' => $validatedData['lastName'],
            'first_name' => $validatedData['firstName'],
            'email' => $validatedData['email'],
            'phone_num' => $validatedData['contact'],
            'check_in' => $validatedData['checkIn'],
            'check_out' => $validatedData['checkOut'],
            'address' => $validatedData['fullAddress'],
            'room_type' => $validatedData['roomType'],
            'room_count' => $validatedData['roomCount'],
            'adult_count' => $validatedData['adultCount'],
            'child_count' => $validatedData['childCount'],
            // 'concerns' => $validatedData['concerns'],
        ]);
        
             $this->sendEmail($request);

            return redirect()->back()->with(['message' => "You're Books successfully added" . $books->firstName]);
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
    
        $data = [
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'contact' => $request->contact,
            'checkIn' => $request->checkIn,
            'checkOut' => $request->checkOut,
            'fullAddress' => $request->fullAddress,
            'roomCount' => $request->roomCount,
            'adultCount' => $request->adultCount,
            'childCount' => $request->childCount,
            'room_type' => $request->room_type,
            'room_number' => $request->room_number,
            'bed' => $request->bed,
            'price' => $request->price,
            'area' => $request->area,
            'location' => $request->location,
            // Add other data fields here if needed
        ];
    
        // Retrieve the email address from the form
        $email = $request->email;
    
        try {
            // Send the email
            Mail::to($email)->send(new Email($data));
            // $this->store($request);
            // If email sent successfully
            // return response()->back()->json(['success' => true]);
            // return response()->back()->json('success', 'Email sent successfully!');
            return redirect()->back()->with('success', 'Email sent successfully!');

        } catch (\Exception $e) {
            // If there's an error sending email
            return redirect()->back()->with(['success' => false, 'error' => 'Failed to send email. Please try again.'], '500');
        }
    }

}
