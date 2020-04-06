<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://fonts.googleapis.com/css?family=Work+Sans: 30%"  />
            <link type="text/css" rel="stylesheet" href="style.css"/>
            <title>Job Search Page</title>
        </head>
<body>
  <div id="jobserach">
    <h1 style="color:white;">Job Search</h1>

<div id="jobsearch_tab">
<form action="/action_page.php">

  <label for="jname">Job title :</label>
  <input type="text" id="txtbox" name="jname" /><br/>

  <label for="keyword">Keywords :</label>
  <input type="text" id="txtbox" name="keyword"/><br/>

  <label for="jtype">Job type :</label>
  <select id="txtbox" name="jtype">

      <option value="FullTime">Full-time</option>
      <option value="PartTime">Part-time</option>
      <option value="Other">Other</option>
    </select>
  </form>
</div>
<br/>
<div style="text-align:center;">
    <button>Clear</button>&nbsp &nbsp &nbsp
    <button>Search</button>&nbsp
    <button>Back</button>
</div>
</div>
</body>
</html>
