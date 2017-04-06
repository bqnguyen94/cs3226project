<div class="panel-body">
    <div class="panel panel-success" data-toggle="collapse" href="#res{{$restaurant->id}}">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a>{{$restaurant->name}}</a>
            </h4>
        </div>
        <div id="res{{$restaurant->id}}" class="panel-collapse collapse">
            <div class="panel-body">
            @foreach ($foods as $food)
            <?php
            if($food->restaurant_id==$restaurant->id){
            ?>
                @include('_food_card')
            <?php 
            }
            ?>  
            @endforeach
            </div>
        </div>
    </div>
</div>
