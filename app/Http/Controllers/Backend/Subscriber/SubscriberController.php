<?php
namespace App\Http\Controllers\Backend\Subscriber;

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

    /**
     * To save subscriber
     * @param Request $validated validated values from subscriber request
     * @return Object $subscriber saved subscriber
     */
    public function store(SubscriberStoreRequest $request)
    {
        $validated = $request->validated();
        $subscribe = $this->subscriberInterface->store($validated);
        Toastr::success('Subscribe Successfully!','SUCCESS');
        
        return redirect()->route('home');
    }
    
    /**
     * To delete subscriber by id
     * @param string $id subscriber id
     * @param string $deletedSubscriberId deleted subscriber id
     */
    public function delete($id)
    {
        $subscribers = $this->subscriberInterface->delete($id);
        Toastr::success('Subscriber Delete Successfully!','SUCCESS');
        
        return redirect()->route('admin.subscriber.index');
    }
}
?>
