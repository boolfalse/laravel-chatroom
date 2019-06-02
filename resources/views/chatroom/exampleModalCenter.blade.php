<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="requests">
            <div class="title">
                <h1>Add your friends</h1>
                <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="content">
                <form>
                    <div class="form-group">
                        <label for="user">Username:</label>
                        <input type="text" class="form-control" id="user" placeholder="Add recipient..." required>
                        <div class="user" id="contact">
                            <img class="avatar-sm" src="{{ asset('chatroom/dist/img/avatars/avatar-female-5.jpg') }}" alt="avatar">
                            <h5>Karen joye</h5>
                            <button type="reset" class="btn"><i class="ti-close"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="welcome">Message:</label>
                        <textarea class="text-control" id="welcome" placeholder="Send your welcome message...">Hi Karen joye, I'd like to add you as a contact.</textarea>
                    </div>
                    <button type="submit" class="btn button w-100">Send Friend Request</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- Add Friends -->