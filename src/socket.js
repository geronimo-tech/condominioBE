let io;

module.exports = {
  init: (server) => {
    io = require("socket.io")(server, {
      cors: {
        origin: "*"
      }
    });

    io.on("connection", (socket) => {
      console.log("Cliente conectado:", socket.id);
    });
  },

  getIO: () => {
    if (!io) {
      throw new Error("Socket no inicializado");
    }
    return io;
  }
};
