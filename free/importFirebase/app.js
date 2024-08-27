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
const db = getFirestore(app);

const getData = async () => {
  try {
    const query = collection(db, "ชื่อคอลเลคชันที่คุณต้องการดึงข้อมูล");
    const snapshot = await getDocs(query);

    if (snapshot.empty) {
      console.log("No matching documents.");
      return;
    }

    snapshot.forEach((doc) => {
      console.log(doc.id, " => ", doc.data());
    });
  } catch (error) {
    console.error("Error fetching documents: ", error);
  }
};

getData();
