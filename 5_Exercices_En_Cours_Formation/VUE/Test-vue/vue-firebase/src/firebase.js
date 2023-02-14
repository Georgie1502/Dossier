import firebase from 'firebase/app';
import "firebase/database";

const firebaseConfig = {
  apiKey: "AIzaSyBz7ldwIyPcGdcOvUV37CK6ojQ8jO5YeV0",
  authDomain: "test-3122b.firebaseapp.com",
  databaseURL: "https://test-3122b-default-rtdb.firebaseio.com",
  projectId: "test-3122b",
  storageBucket: "test-3122b.appspot.com",
  messagingSenderId: "381648487126",
  appId: "1:381648487126:web:126b843eebd874ed407f77"
};

  // Initialize Firebase
firebase.initializeApp(firebaseConfig);
export default firebase.database()