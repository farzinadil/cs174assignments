const express = require("express");

const PORT = 8888;

const app = express();

app.get("/test", (req, res) => {
    res.json({ message: "Test Request" });
});
  

app.listen(PORT, () => {
  console.log(`Server listening on ${PORT}`);
});