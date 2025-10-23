import React from "react";
import { useNavigate } from "react-router-dom";

const Home = () => {
  const username = localStorage.getItem("username") || "Player";
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem("username");
    navigate("/"); // back to login
  };

  return (
    <div style={{ textAlign: "center", marginTop: "50px", fontFamily: "Arial" }}>
      <h2>Welcome, {username} 🎉</h2>
      <button
        onClick={handleLogout}
        style={{
          padding: "10px 20px",
          borderRadius: "5px",
          border: "none",
          background: "#c0392b",
          color: "#fff",
          cursor: "pointer",
        }}
      >
        Logout
      </button>
    </div>
  );
};

export default Home;
