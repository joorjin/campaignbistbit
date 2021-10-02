<div class="part2">
    <img class="backgruond" src="img/02-h-02.png" alt="">
    <img class="caracter" src="img/Caracter-miror.png" alt="">

    <div class="texts">
      <div class="text1">
        <p>امتیاز شما :25</p>
      </div>
      <div class="text2">
          <br>
        <b>جوایز من</b>
        <p></p>
        @if ($award_wonss == 'new_login')

        @else
            @foreach ($award_wonss as $item)
                <p><?php echo($item[0]['name']); ?></p>
            @endforeach
        @endif

      </div>

      <div class="text3">
        <p>لینک دعوت شما :
          <br>
          <b>https://20bash.bistbit.com/invite/{{ $invitation_code }}</b></p>
          <b>تعداد نفرات دعوت شده:{{ $invited_users }}</b>
          <br>
          <b>تعداد شانس های مانده: {{ $permitted_act }}</b>
          <br>
          <b></b>
      </div>
    </div>
  </div>
  <!-- end part 2 -->









