var http = require("http");
const hostname = "localhost";
const port = 4000;
var dt = require("./mymodule");
var uc = require("upper-case");

const server = http.createServer(function (req, res) {
  res.writeHead(200, { "Content-Type": "text/html" });
  res.write("The current dtm is " + dt.myDateTime());
  res.write("I'll be home by 8pm");
  res.write(uc.upperCase("justin bieber"));
  // console.log('Server Started At');
  res.end();
});
server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});