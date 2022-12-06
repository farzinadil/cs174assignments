const express = require('express');

function normalizeVector(vector) {
    
    mag = Math.sqrt(vector);
    norm = vector / mag;   
    return norm; 
}

function compareUserDistances(normA, normB) {

    dist = Math.abs(normA - normB);
    return dist;
}

