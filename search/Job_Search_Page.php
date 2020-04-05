<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">

<body>

<h1>The input value attribute</h1>

<div style="color:black; padding-top: 15px; border: 3px solid blue;">
<form action="/action_page.php">
Search Criteria:<br>
  <label for="Jobname">JobName  :</label>
  <input type="text" id="Jobname" name="Jobname"><br>
  
  <label for="Keyword1">Keyword1:</label>
  <input type="text" id="Keyword1" name="Keyword1" value=><br>
  
  <label for="Jtype">JobType:</label>
  <select id="Jtype" name="jtype">
      <option value="FullTime">Full-time</option>
      <option value="PartTime">Part-time</option>
      <option value="Other">Other</option>
    </select>
  </form>
</div>
<br></br>

<div style="text-align:center;">
    <button>Clear</button>&nbsp &nbsp &nbsp
    <button>Search</button>&nbsp
    <button>Back</button>
</div>

</body>
</html>
