<?php
namespace App\Http\Controllers\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SubscriberStoreRequest;
use App\Contracts\Services\Subscriber\SubscriberServiceInterface;

class SubscriberController extends Controller
{
    /**
     * subscriber interface
     */
    private $subscriberInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubscriberServiceInterface $subscriberInterface)
    {
        $this->subscriberInterface = $subscriberInterface;
    }

    /**
     * To show subscriber information
     * 
     * @return View index subscriber
     */
    public function index()
    {
        $subscribers = $this->subscriberInterface->index();
        $i = (request()->input('page', 1) - 1) * 10;

        return view('admin.subscriber.index', compact('subscribers','i'));
    }
    public function store(SubscriberStoreRequest $request)
    {
        $subscribe = $this->subscriberInterface->store($request);
        Toastr::success('subscriber Successfully!','SUCCESS');
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $subscribers = $this->subscriberInterface->delete($id);

        Toastr::success('Subscriber Delete Successfully!','SUCCESS');
        return redirect()->route('admin.subscriber.index');
    }
}
?>