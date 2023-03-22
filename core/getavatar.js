function generateAvatar() {
  const data = {
    avatarStyle: ["Circle", "Transparent"],
    accessoriesType: [
      "Blank",
      "Kurt",
      "Prescription01",
      "Prescription02",
      "Round",
      "Sunglasses",
      "Wayfarers",
    ],

    hairColorCode: [
      "#A55727",
      "#000000",
      "#B58142",
      "#D6B370",
      "#714232",
      "#4A322B",
      "#F59797",
      "#ECDCBF",
      "#C93200",
      "#E8E1E1",
    ],
    hairColor: [
      "Auburn",
      "Black",
      "Blonde",
      "BlondeGolden",
      "Brown",
      "BrownDark",
      "PastelPink",
      "Platinum",
      "Red",
      "SilverGray",
    ],
    clotheColor: [
      "Black",
      "Blue01",
      "Blue02",
      "Blue03",
      "Gray01",
      "Gray02",
      "Heather",
      "PastelBlue",
      "PastelGreen",
      "PastelOrange",
      "PastelRed",
      "PastelYellow",
      "Pink",
      "Red",
      "White",
    ],
    clotheColorCode: [
      "#262E33",
      "#65C9FF",
      "#5199E4",
      "#25557C",
      "#E6E6E6",
      "#929598",
      "#3C4F5C",
      "#B1E2FF",
      "#A7FFC4",
      "#FFDEB5",
      "#FFAFB9",
      "#FFFFB1",
      "#FF488E",
      "#FF5C5C",
      "#FFFFFF",
    ],

    facialHairType: [
      "Blank",
      "BeardMedium",
      "BeardLight",
      "BeardMagestic",
      "MoustacheFancy",
      "MoustacheMagnum",
    ],
    clotheType: [
      "BlazerShirt",
      "BlazerSweater",
      "CollarSweater",
      "GraphicShirt",
      "Hoodie",
      "Overall",
      "ShirtCrewNeck",
      "ShirtScoopNeck",
      "ShirtVNeck",
    ],
    eyeType: [
      "Close",
      "Cry",
      "Default",
      "Dizzy",
      "EyeRoll",
      "Happy",
      "Hearts",
      "Side",
      "Squint",
      "Surprised",
      "Wink",
      "WinkWacky",
    ],
    eyebrowType: [
      "Angry",
      "AngryNatural",
      "Default",
      "DefaultNatural",
      "FlatNatural",
      "RaisedExcited",
      "RaisedExcitedNatural",
      "SadConcerned",
      "SadConcernedNatural",
      "UnibrowNatural",
      "UpDown",
      "UpDownNatural",
    ],
    mouthType: [
      "Concerned",
      "Default",
      "Disbelief",
      "Eating",
      "Grimace",
      "Sad",
      "ScreamOpen",
      "Serious",
      "Smile",
      "Tongue",
      "Twinkle",
      "Vomit",
    ],
    skinColor: [
      "Tanned",
      "Yellow",
      "Pale",
      "Light",
      "Brown",
      "DarkBrown",
      "Black",
    ],
    topType: [
      "NoHair",
      "Eyepatch",
      "Hat",
      "Hijab",
      "Turban",
      "WinterHat1",
      "WinterHat2",
      "WinterHat3",
      "WinterHat4",
      "LongHairBigHair",
      "LongHairBob",
      "LongHairBun",
      "LongHairCurly",
      "LongHairCurvy",
      "LongHairDreads",
      "LongHairFrida",
      "LongHairFro",
      "LongHairFroBand",
      "LongHairNotTooLong",
      "LongHairShavedSides",
      "LongHairMiaWallace",
      "LongHairStraight",
      "LongHairStraight2",
      "LongHairStraightStrand",
      "ShortHairDreads01",
      "ShortHairDreads02",
      "ShortHairFrizzle",
      "ShortHairShaggyMullet",
      "ShortHairShortCurly",
      "ShortHairShortFlat",
      "ShortHairShortRound",
      "ShortHairShortWaved",
      "ShortHairSides",
      "ShortHairTheCaesar",
      "ShortHairTheCaesarSidePart",
    ],
  };
  let rand1 =
    data.accessoriesType[
      Math.floor(Math.random() * data.accessoriesType.length)
    ];
  let rand2 = data.hairColor[Math.floor(Math.random() * data.hairColor.length)];
  let rand3 =
    data.clotheColor[Math.floor(Math.random() * data.clotheColor.length)];
  let rand4 =
    data.facialHairType[Math.floor(Math.random() * data.facialHairType.length)];
  let rand5 =
    data.clotheType[Math.floor(Math.random() * data.clotheType.length)];
  let rand6 = data.eyeType[Math.floor(Math.random() * data.eyeType.length)];
  let rand7 =
    data.eyebrowType[Math.floor(Math.random() * data.eyebrowType.length)];
  let rand8 = data.mouthType[Math.floor(Math.random() * data.mouthType.length)];
  let rand9 = data.skinColor[Math.floor(Math.random() * data.skinColor.length)];
  let rand10 = data.topType[Math.floor(Math.random() * data.topType.length)];

  let url =
    "https://avataaars.io/?avatarStyle=Circle&topType=" +
    rand10 +
    "&accessoriesType=" +
    rand1 +
    "&hairColor=" +
    rand2 +
    "&facialHairType=" +
    rand4 +
    "&clotheType=" +
    rand5 +
    "&clotheColor=" +
    rand3 +
    "&eyeType=" +
    rand6 +
    "&eyebrowType=" +
    rand7 +
    "&mouthType=" +
    rand8 +
    "&skinColor=" +
    rand9;
  return url;
}
