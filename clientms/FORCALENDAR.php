<label>OLD DATE & TIME: </label>
<input id="startDur" type="datetime-local" name="startDur" />
<input type="text" id="rate" value="10" disabled>
<p>
    <label>NEW DATE & TIME: </label>
    <input id="new" type="datetime-local" name="new" onBlur="var x = ((new Date(this.value) - new Date(startDur.value))/(1000*60*60)) * document.getElementById('rate').value; nfObject = new Intl.NumberFormat('en-US'); output = nfObject.format(x); document.getElementById('total').value = output + '.00';" />
<p>
<label>DIFFERENCE IN HOURS :</label>
<br>
<input id="total" type="text" name="total" />