<?php
require_once("db.php");
session_start();
$username = "";
$pwd = "";
$name = "";
$class1 = "";
$class2 = "";
$accounttype = "";
$nummeetings = 0;
$rating = 0;

if (isset($_SESSION["username"]))
    $username = $_SESSION["username"];
if (isset($_SESSION["password"]))
    $pwd = $_SESSION["password"];
if (isset($_SESSION["name"]))
    $name = $_SESSION["name"];
if (isset($_SESSION["class1"]))
    $class1 = $_SESSION["class1"];
if (isset($_SESSION["class2"]))
    $class2 = $_SESSION["class2"];
if (isset($_SESSION["accounttype"]))
    $accounttype = $_SESSION["accounttype"];
if (isset($_SESSION["numberofmeetings"]))
    $nummeetings = $_SESSION["numberofmeetings"];
if (isset($_SESSION["rating"]))
    $rating = $_SESSION["rating"];
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Likes to Dislikes</title>
<meta charset="utf-8">
<style>

.bar {
  fill: steelblue;
}

.bar:hover {
  fill: brown;
}

.axis--x path {
  display: none;
}

</style>
</head>
<body>

<svg width="960" height="500"></svg>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>

var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);
    console.log(y(3));

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

//specify our data source
/*
d3.tsv("data.tsv", function(d) {
  d.frequency = +d.frequency;
  return d;
}, function(error, data) {
*/

d3.json("getDatad3RH.php?tid=<?php
if(isset($_SESSION["username"])) echo $_SESSION["username"];
?>", function(error, data){
      if (error){
        throw error;

      } 
  data.forEach(function(d){
    d.frequency = d.numberofupvotes;
    //d.frequency = d.numberofdownvotes;
  })

  console.log(data);

  if (error) throw error;

  x.domain(data.map(function(d) { return "Up Votes"; }));
  y.domain([0, 20]);

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y).ticks(4, "s"))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Frequency");

  g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.letter); })
      .attr("y", function(d) { return y(d.frequency); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return height - y(d.frequency); });
});

</script>
</body>
</html>