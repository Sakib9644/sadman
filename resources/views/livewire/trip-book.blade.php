<div>
    <div class="row">
        @if (session()->has('message'))
            <p class="alert alert-success">Your Ticket Booked. Please complete the transaction between 24 hour , otherwise your booking will be cancle</p>
        @endif
            <div class="col-sm-4">
                <label class="form-label" for="date"> Booking Date</label>
                <p>{{ $trip->date }}</p>
            </div>
            <div class="col-sm-4">
                <label class="form-label" for="date"> Booking Time</label>
                <p>{{ $trip->time }}</p>
            </div>
            <div class="col-sm-4">
                <p><b>Seat Info:</b></p>
                <div class="form-check">
                    <input class="form-check-input" disabled type="checkbox">
                    <label class="form-check-label text-danger" for="booked">
                        Booked
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-labebl" for="available">
                        Available
                    </label>
                  
                </div>
            </div>

             <div class="col-sm-12">
             

           
                <button wire:click.prevent="searchSeat" class="btn btn-primary btn-sm">View Seats </button>
                

            </div>
            
            
    </div>

    <hr>
     
   
    @if (count($seats) > 0)
        @foreach ($trip->bus->seats->chunk(6) as $row)
            <div class=>
                @foreach ($row as $seat)
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input wire:model="selectedSeats" class="form-check-input" type="checkbox" name="chk" onclick= return sakib
                                value="{{ $seat->id }}" id="seat-{{ $seat->id }}" @foreach ($booked as $book)
                            @if ($book->seat_id == $seat->id )
                          
                            
                            disabled
                            
                            @endif  
                                   

               
                            @endforeach
                >
                
               
                             

                
                <label
                    class="form-check-label
                @foreach ($booked as $book)
                        @if ($book->seat_id == $seat->id)
                        text-danger
                        @endif
                    @endforeach
                "
                    for="seat-{{ $seat->id }}">
                    {{ $seat->name }}
                    
                </label>
            </div>
</div>
@endforeach
</div>
@endforeach
<br>

<h4>Seat and bookig status</h4><br>
<hr>
@if (count($selectedSeats) < 7)
<p><b>Total Seats:</b> {{ count($selectedSeats) ?? '0' }}</p>
<!-- <p><b>Available Seats:</b>  {{ count($seats ) }} - {{ count($booked ) }}</p> -->

        

<p><b >Total Price:</b> {{ $totalPrice ?? '00.00' }}</p>




@else
{{$seat->seat_id}}
<H2  ><b> You can  book only 7 seats from a bus </b></H2>
         @endif

@if(!empty(auth()->user()))

@if (count($selectedSeats) <7)

<button wire:click="book" type="submit" class="btn btn-primary btn-sm">Book Now</button>

<a href="{{route('booking.details')}}" class="btn btn-primary btn-sm">View Booking Details</a>


@else

         

         @endif
@else
<a href="{{route('user.login')}}" class="btn btn-primary btn-sm">Book Now</a>
@endif
@endif



</div>
