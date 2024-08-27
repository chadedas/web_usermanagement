import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-app.js";
import { getFirestore, collection, getDocs } from "https://www.gstatic.com/firebasejs/10.13.0/firebase-firestore.js"; 

const firebaseConfig = {
  apiKey: "AIzaSyBtBDhTwJJgoCajgXu4AQEmuVkVTnPvY0Q",
  authDomain: "webmanagerkr150.firebaseapp.com",
  databaseURL: "https://webmanagerkr150-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "webmanagerkr150",
  storageBucket: "webmanagerkr150.appspot.com",
  messagingSenderId: "969844634042",
  appId: "1:969844634042:web:516db0472b523af5086d83",
  measurementId: "G-1R76H9L66G"
};
const app = initializeApp(firebaseConfig);
const db = getFirestore(app)

async function getData(db) {
  const empCol = collection(db, 'NPDatabase')
  const empSnapshot = await getDocs(empCol)
  return empSnapshot
}

function showData(NPDatabase){
    console.log(NPDatabase.data());
}
//ดึง doc
const data = await getData(db)
data.array.forEach(NPDatabase => {
  forEach(NPDatabase)
});