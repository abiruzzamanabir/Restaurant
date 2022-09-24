<section id="container" class="sub-page">
    <div class="wrap-container zerogrid">
        <div class="crumbs">
            <ul>
                <li><a href="{{ route('home.page') }}">Home</a></li>
                <li><a href="{{ route('reservation.page') }}">Reservation</a></li>
            </ul>
        </div>
        <div id="main-content">
            <div class="wrap-content">
                <div class="row">
                    <div class="col-1-3">
                        <div class="wrap-col">
                            <h3>Complete the Submission Form</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard</p><br />
                            <h3>Or Just Make a Call</h3>
                            <p>+6221 888 888 90 <br>
                                +6221 888 88891</p>
                            <p>info@yourdomain.com</p>
                        </div>
                    </div>
                    <div class="col-2-3">
                        <div class="wrap-col">
                            <div class="contact">
                                @include('validate')
                                <div id="contact_form">
                                    <form name="contact" id="contact" action="{{ route('reservation.store') }}" method="POST">
                                        @csrf
                                        <label class="row">
                                            <div class="col-1-2">
                                                <div class="wrap-col">
                                                    <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Enter name" />
                                                </div>
                                            </div>
                                            <div class="col-1-2">
                                                <div class="wrap-col">
                                                    <input type="email" name="email" value="{{old('email')}}" id="email"
                                                        placeholder="Enter email" />
                                                </div>
                                            </div>
                                        </label>
                                        <label class="row">
                                            <div class="col-2-4">
                                                <div class="wrap-col">
                                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" />
                                                </div>
                                            </div>
                                            <div class="col-1-4">
                                                <div class="wrap-col">
                                                    <input type="date" name="date" value="{{old('date')}}" id="datepicker" placeholder="Date" />
                                                </div>
                                            </div>
                                            <div class="col-1-4">
                                                <div class="wrap-col">
                                                    <input type="time" name="time" value="{{old('time')}}" id="time" placeholder="Time" />
                                                </div>
                                            </div>
                                        </label>
                                        <label class="row">
                                            <div class="wrap-col">
                                                <input type="text" name="subject" value="{{old('subject')}}" id="subject" placeholder="Subject" />
                                            </div>
                                        </label>
                                        <label class="row">
                                            <div class="wrap-col">
                                                <textarea name="message" id="message" class="form-control" rows="4"
                                                    cols="25" placeholder="Message"></textarea>
                                            </div>
                                        </label>
                                        <center>
                                            <button class="sendButton" type="submit">Submit</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>