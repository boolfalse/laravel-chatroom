@extends('layouts.chatroom')

@section('chat_dialog')

<div class="main" id="chat-dialog">
    <div class="tab-content" id="nav-tabContent">

    <!-- Start of Babble -->
        <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
            <!-- Start of Chat -->
            <div class="chat" id="chat1">
                <div class="top">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="inside">
                                <div class="status online"></div>
                                <div class="data">
                                    <h5><a href="#">{{ $speaker->name }}</a></h5>
                                    <span>Active now</span>
                                </div>
                                <button class="btn d-md-block d-none audio-call" title="Audio call">
                                    <i class="ti-headphone-alt"></i>
                                </button>
                                <button class="btn d-md-block d-none video-call" title="Video call">
                                    <i class="ti-video-camera"></i>
                                </button>
                                <button class="btn d-md-block d-none" title="More Info">
                                    <i class="ti-info"></i>
                                </button>
                                <div class="dropdown">
                                    <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-view-grid"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item audio-call"><i class="ti-headphone-alt"></i>Voice Call</a>
                                        <a href="#" class="dropdown-item video-call"><i class="ti-video-camera"></i>Video Call</a>
                                        <hr>
                                        <a href="#" class="dropdown-item"><i class="ti-server"></i>Clear History</a>
                                        <a href="#" class="dropdown-item"><i class="ti-hand-stop"></i>Block Contact</a>
                                        <a href="#" class="dropdown-item"><i class="ti-trash"></i>Delete Contact</a>
                                    </div>
                                </div>
                                <button class="btn back-to-mesg" title="Back">
                                    <i class="ti-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="content">
                    <div class="container">
                        <div class="col-md-12">
                            @foreach($conversations->reverse() as $conversation)
                                <div class="message {{ $user->id == $conversation->user_id ? 'me' : '' }}">
                                    @if($user->id != $conversation->user_id)
                                    <img class="avatar-md" src="{{ asset('uploads/' . config('custom.user_images_folder') . '/small/' . $speaker->image) }}" data-toggle="tooltip" data-placement="top" title="{{ $speaker->name }}" alt="avatar">
                                    @endif
                                    <div class="text-main">
                                        <div class="text-group">
                                            <div class="text">
                                                <p>{{ $conversation->text }}</p>
                                            </div>
                                        </div>
                                        <span>{{ $conversation->written }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <div class="bottom">
                            <form class="text-area">
                                <textarea class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
                                <div class="add-smiles">
                                    <span title="add icon" class="em em-blush"></span>
                                </div>
                                <div class="smiles-bunch">
                                    <i class="em em---1"></i>
                                    <i class="em em-smiley"></i>
                                    <i class="em em-anguished"></i>
                                    <i class="em em-laughing"></i>
                                    <i class="em em-angry"></i>
                                    <i class="em em-astonished"></i>
                                    <i class="em em-blush"></i>
                                    <i class="em em-disappointed"></i>
                                    <i class="em em-worried"></i>
                                    <i class="em em-kissing_heart"></i>
                                    <i class="em em-rage"></i>
                                    <i class="em em-stuck_out_tongue"></i>
                                    <i class="em em-expressionless"></i>
                                    <i class="em em-bikini"></i>
                                    <i class="em em-christmas_tree"></i>
                                    <i class="em em-facepunch"></i>
                                    <i class="em em-pushpin"></i>
                                    <i class="em em-tada"></i>
                                    <i class="em em-us"></i>
                                    <i class="em em-rose"></i>
                                </div>
                                <button type="submit" class="btn send"><i class="ti-location-arrow"></i></button>
                            </form>
                            <label>
                                <input type="file">
                                <span class="btn attach"><i class="ti-clip"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Chat -->
            <!-- Start of Call -->
            <div class="call" id="call1">
                <div class="content">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="inside">
                                <div class="panel">
                                    <div class="participant">
                                        <img class="avatar-xxl" src="{{ asset('uploads/' . config('custom.user_images_folder') . '/small/' . $speaker->image) }}" alt="avatar">
                                        <span>Connecting to {{ $speaker->first_name }}</span>
                                        <div class="wave">
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </div>
                                    </div>
                                    <div class="options">
                                        <button class="btn option"><i class="ti-microphone"></i></button>
                                        <button class="btn option"><i class="ti-video-camera"></i></button>
                                        <button class="btn option"><i class="ti-user">+</i></button>
                                        <button class="btn option"><i class="ti-volume"></i></button>
                                        <button class="btn option"><i class="ti-comment"></i></button>
                                    </div>
                                    <button class="btn option call-end"><i class="ti-close"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Call -->
        </div>
        <!-- End of Babble -->

    </div>
</div>

@endsection