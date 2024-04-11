<div class="container mt-5">

  <div class="row head" style="display: flex; justify-content: center; margin-bottom: 40px;">

  </div>

  <h1>Player Info</h1>
  <div class="row playerInfo" style="display: flex; justify-content: center;">

  </div>

  <h1>Player Stats</h1>
  <p id="thisSeason"></p>
  <div class="row playerStat" style="display: flex; justify-content: center;">



  </div>

</div>

<script src="apiKey.js"></script>
<script>

  const urlParams = new URLSearchParams(window.location.search);

  const playerId = urlParams.get("player");
  const kep = urlParams.get("photo");
  const url = 'https://api-football-v1.p.rapidapi.com/v2/players/player/' + playerId;
  const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': apiKey,
      'X-RapidAPI-Host': 'api-football-v1.p.rapidapi.com'
    }
  };

  ///////////////////////////////////////////////////////////
  fetch(url, options)
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      console.log(data);
      console.log(data.api.players[0]);
      const player = data.api.players[0];
      const rating = Math.floor(player.rating);

      document.querySelector('.head').innerHTML += `
      <div class="col-4 text-center">
        <img src="${kep}" alt="kep">
      </div>

      <div class="col-4 text-center">
          <h3>${player.player_name}</h3>
          <p>${player.firstname} ${player.lastname}</p>
          <h3>Age: ${player.age}</h3>
      </div>

      <div class="col-4 text-center">
        <button src="" id="csillag" onclick="addFavorite([${player.player_id}, '${kep}', '${player.player_name}'])" style="width: 100px; height: 100px; border: none; background: none;"><img src="../client/img/starBlack.png" alt="csillag"></button>
        <h3>Rating: ${rating}/10 <img src="../client/img/starGold.png" alt="csillag" style="height: 30px; weight: 30px; "></h3>
      </div>
      `;

      document.querySelector('#thisSeason').innerHTML = `
        Player's statistics from this season: <b>${player.season}</b>
      `;

      document.querySelector('.playerInfo').innerHTML += `
      <dl class="row text-center">
        <dt class="col-3"></dt>
        <dt class="col-5">Height: </dt>
        <dd class="col-4">${player.height}</dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Weight: </dt>
        <dd class="col-4">${player.weight}</dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Position: </dt>
        <dd class="col-4">${player.position}</dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Birthdate:</dt>
        <dd class="col-4">${player.birth_date}</dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Birthplace:</dt>
        <dd class="col-4">${player.birth_place}</dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Birthcountry:</dt>
        <dd class="col-4">${player.birth_country}</dd>
      </dl>
      `;

      document.querySelector('.playerStat').innerHTML += `
      <dl class="row text-center">
        <dt class="col-3"></dt>
        <dt class="col-5">Matches: </dt>
        <dd class="col-4">
          <p>Played: <b>${player.games.appearences}</b></p>
          <p>Minutes Played: <b>${player.games.minutes_played}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Goals: </dt>
        <dd class="col-4">
          <p>Goals: <b>${player.goals.total}</b></p>
          <p>Assists: <b>${player.goals.assists}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Shots:</dt>
        <dd class="col-4">
          <p>Shot on: <b>${player.shots.on}</b></p>
          <p>Overall: <b>${player.shots.total}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Passes: </dt>
        <dd class="col-4">
          <p>Accuracy: <b>${player.passes.accuracy}</b></p>
          <p>Key passes: <b>${player.passes.key}</b></p>
          <p>Overall: <b>${player.passes.total}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Cards:</dt>
        <dd class="col-4">
          <p>Yellow Cards: <b>${player.cards.yellow}</b></p>
          <p>Red Cards: <b>${player.cards.red}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Fouls:</dt>
        <dd class="col-4">
          <p>Committed: <b>${player.fouls.committed}</b></p>
          <p>Drawn: <b>${player.fouls.drawn}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Duels:</dt>
        <dd class="col-4">
          <p>Won: <b>${player.duels.won}</b></p>
          <p>Overall: <b>${player.duels.total}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Dribbes:</dt>
        <dd class="col-4">
          <p>Attempts: <b>${player.dribbles.attempts}</b></p>
          <p>Success: <b>${player.dribbles.success}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Penalties:</dt>
        <dd class="col-4">
          <p>Missed: <b>${player.penalty.missed}</b></p>
          <p>Success: <b>${player.penalty.success}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Tackles:</dt>
        <dd class="col-4">
          <p>Blocks: <b>${player.tackles.blocks}</b></p>
          <p>Interceptions: <b>${player.tackles.interceptions}</b></p>
          <p>Overall: <b>${player.tackles.total}</b></p>
        </dd>

        <dt class="col-3"></dt>
        <dt class="col-5">Substitudes:</dt>
        <dd class="col-4">
          <p>Bench: <b>${player.substitutes.bench}</b></p>
          <p>In: <b>${player.substitutes.in}</b></p>
          <p>Out: <b>${player.substitutes.out}</b></p>
        </dd>

    </dl>
      `;

    })
    .catch(error => {
      console.error(error);
    });

  function addFavorite(objString) {
    document.querySelector('#csillag').innerHTML = `
        <img src="../client/img/starGold.png" alt="csillag">
      `;
    var obj = eval(objString);
    console.log(obj[0], obj[1], obj[2]);
    let myFormData = new FormData();
    myFormData.append('player_id', obj[0]);
    myFormData.append('photo', obj[1]);
    myFormData.append('player_name', obj[2]);
    console.log(myFormData);

    let configObj = {
      method: 'POST',
      body: myFormData
    }
    postData('addFavourite.php', renderResult, configObj);

  }

  function renderResult(data) {
    console.log(data.msg);
  }

</script>