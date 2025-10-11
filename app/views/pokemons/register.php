  <div class="form-container">
    <form enctype="multipart/form-data" method="POST" action="/pokemon/public/actions/register_pokemon.php">
      <div class="field-container">
        <label for="poqmon-name">Poqmon Name:</label>
        <input required name="poqmon-name" id="poqmon-name">
      </div>
      <div class="field-container">
        <label for="poqmon-description">Poqmon Description:</label>
        <textarea required name="poqmon-description" id="poqmon-description"></textarea>
      </div>
      <div class="field-container">
        <label for="poqmon-type">Poqmon Type:</label>
        <select required name="poqmon-type" id="poqmon-type">
          <option value="">Select a type...</option>
          <option value="Plant">Plant</option>
          <option value="Fire">Fire</option>
          <option value="Water">Water</option>
          <option value="Eletric">Eletric</option>
        </select>
      </div>
      <div class="field-container">
        <label for="poqmon-image">Select a image</label>
        <input name="poqmon-image" id="poqmon-image" type="file">
      </div>
      <div class="field-container">
        <input class="send" type="submit" name="send">
      </div>
    </form>
  </div>