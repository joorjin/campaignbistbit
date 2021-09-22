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
        @foreach ($award_wonss as $item)
            <p><?php echo($item[0]['name']); ?></p>
        @endforeach
      </div>

      <div class="text3">
        <p>لینک دعوت شما :
          <br>
          <b>https://20bash.bistbit.com/{{ $invitation_code }}</b></p>
      </div>
    </div>
  </div>
  <!-- end part 2 -->
