package com.example.movietheater.Entity;

import java.util.List;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Movie {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	Long id;
	
	String name, genre, director, cast, duration;
	
	@Column(length = 1000)
	String summary, poster, trailer;
	
	int rating_imdb, rating_rottenTomatoes, rating_metacritic, rating_letterboxd;
	
	@JsonManagedReference("movie-tickets")
	@OneToMany(mappedBy = "movie", cascade = CascadeType.ALL, orphanRemoval = true)
	List<Ticket> tickets;
	
	public Movie() {
		
	}
	
	public Movie(String name, String genre, String director, String cast, String duration, String summary, String poster, String trailer, int rating_imdb, int rating_rottenTomatoes, int rating_metacritic, int rating_letterboxd) {
		this.name = name;
		this.genre = genre;
		this.director = director;
		this.cast = cast;
		this.duration = duration;
		this.summary = summary;
		this.poster = poster;
		this.trailer = trailer;
		this.rating_imdb = rating_imdb;
		this.rating_rottenTomatoes = rating_rottenTomatoes;
		this.rating_metacritic = rating_metacritic;
		this.rating_letterboxd = rating_letterboxd;
	}



	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getGenre() {
		return genre;
	}

	public void setGenre(String genre) {
		this.genre = genre;
	}

	public String getDirector() {
		return director;
	}

	public void setDirector(String director) {
		this.director = director;
	}

	public String getCast() {
		return cast;
	}

	public void setCast(String cast) {
		this.cast = cast;
	}

	public String getDuration() {
		return duration;
	}

	public void setDuration(String duration) {
		this.duration = duration;
	}

	public String getSummary() {
		return summary;
	}

	public void setSummary(String summary) {
		this.summary = summary;
	}

	public String getPoster() {
		return poster;
	}

	public void setPoster(String poster) {
		this.poster = poster;
	}

	public String getTrailer() {
		return trailer;
	}

	public void setTrailer(String trailer) {
		this.trailer = trailer;
	}

	public int getRating_imdb() {
		return rating_imdb;
	}

	public void setRating_imdb(int rating_imdb) {
		this.rating_imdb = rating_imdb;
	}

	public int getRating_rottenTomatoes() {
		return rating_rottenTomatoes;
	}

	public void setRating_rottenTomatoes(int rating_rottenTomatoes) {
		this.rating_rottenTomatoes = rating_rottenTomatoes;
	}

	public int getRating_metacritic() {
		return rating_metacritic;
	}

	public void setRating_metacritic(int rating_metacritic) {
		this.rating_metacritic = rating_metacritic;
	}

	public int getRating_letterboxd() {
		return rating_letterboxd;
	}

	public void setRating_letterboxd(int rating_letterboxd) {
		this.rating_letterboxd = rating_letterboxd;
	}

	public List<Ticket> getTickets() {
		return tickets;
	}

	public void setTickets(List<Ticket> tickets) {
		this.tickets = tickets;
	}
}