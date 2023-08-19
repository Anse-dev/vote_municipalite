CREATE TABLE Votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    candidate_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Utilisateurs(id),
    FOREIGN KEY (candidate_id) REFERENCES Candidats(id)
);
