import React from "react";
import { BrowserRouter } from "react-router-dom"
import App from "./_app";
import { ReactDOM } from "react-dom/client";

// check if the document object is defined
if (typeof document !== "undefined") {
  const root = ReactDOM.createRoot(document.getElementById("root"))
  root.render(
    <React.StrictMode>
      <BrowserRouter>
        <App />
      </BrowserRouter>
    </React.StrictMode>
  )
}