<header class="ui menu">
    <a href="{{route('home')}}" class="olive item {{request()->is('home')? 'active':''}}"><i class="home icon"></i>ទំព័រដើម</a>
    <a href="{{route('media.index')}}" class="olive item {{request()->is('media')? 'active':''}}"><i class="image icon"></i>មេឌៀ</a>
    <div class="olive item {{request()->is('staff*')? 'active':''}}">
        <div class="ui dropdown">
            <i class="user icon"></i>
            <div class="text">បុគ្គលិក</div>
            <i class="dropdown icon"></i>
            <div class="menu">
                <a href="{{route('staff.create')}}" class="item {{request()->is('staff/create')? 'active':''}}">បន្ថែម</a>
                <a href="{{route('staff.index')}}" class="item {{request()->is('staff')? 'active':''}}">បង្ហាញ</a>
                <a href="{{route('staff.export')}}" class="item {{request()->is('staff-export')? 'active':''}}">នាំចេញ</a>
            </div>
        </div>
    </div>
    <a href="{{route('notification.staff')}}" class="olive item {{request()->is('notification-staff')? 'active':''}}"><i class="bell icon"></i>
        ការជូនដំណឹង
        <div class="floating ui pink label" id="notification">0</div>
    </a>
</header>
