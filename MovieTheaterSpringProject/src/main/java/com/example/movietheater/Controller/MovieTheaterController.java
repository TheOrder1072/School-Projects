package com.example.movietheater.Controller;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Locale;
import java.util.Map;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;
import com.example.movietheater.Entity.Movie;
import com.example.movietheater.Entity.Ticket;
import com.example.movietheater.Entity.User;
import com.example.movietheater.Repository.MovieRepository;
import com.example.movietheater.Repository.TicketRepository;
import com.example.movietheater.Repository.UserRepository;
import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("movietheater")
public class MovieTheaterController {
	
	@Autowired
	UserRepository userRepository;
	
	@Autowired
	MovieRepository movieRepository;
	
	@Autowired
	TicketRepository ticketRepository;
	
    //Create a formatter for the desired format
    DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("MMMM d", Locale.ENGLISH);
	
	//Get current date
    LocalDate currentDate = LocalDate.now();
    String today = currentDate.format(dateFormatter); 
    
    //Get tomorrow's date
    LocalDate tomorrowDate = currentDate.plusDays(1);
    String tomorrow = tomorrowDate.format(dateFormatter); 
    
    //Get the day after tomorrow
    LocalDate dayAfterTomorrowDate = currentDate.plusDays(2);
    String dayAfterTomorrow = dayAfterTomorrowDate.format(dateFormatter); 
	
    //insert movies
	private void insertMovies() {
		
		Movie movie1 = new Movie("Dune Part-II", "Science Fiction", "Denis Villeneuve", "Timothée Chalamet, Zendaya, Rebecca Ferguson", "2h 46m", "Paul Atreides unites with the Fremen while on a warpath of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the universe, he endeavors to prevent a terrible future.", "https://image.tmdb.org/t/p/original/mFnF8tpPMqEwti2J2aMhYGZYdv0.jpg", "https://www.youtube.com/watch?v=Way9Dexny3w", 85, 92, 79, 88);
		movieRepository.save(movie1);

		Movie movie2 = new Movie("Black Swan", "Drama, Thriller, Horror", "Darren Aronofsky", "Natalie Portman, Mila Kunis, Vincent Cassel", "1h 48m", "The story of Nina, a ballerina in a New York City ballet company whose life, like all those in her profession, is completely consumed with dance. She lives with her retired ballerina mother Erica who zealously supports her daughter’s professional ambition. When artistic director Thomas Leroy decides to replace prima ballerina Beth MacIntyre for the opening production of their new season, Swan Lake, Nina is his first choice.", "https://m.media-amazon.com/images/I/61z-zAxE0wL._AC_UF1000,1000_QL80_.jpg", "https://www.youtube.com/watch?v=5jaI1XOB-bs", 80, 85, 79, 84);
		movieRepository.save(movie2);

		Movie movie3 = new Movie("Blade Runner 2049", "Science Fiction, Drama, Cyberpunk", "Denis Villeneuve", "Harrison Ford, Ryan Gosling, Ana de Armas", "2h 44m", "Thirty years after the events of the first film, a new blade runner, LAPD Officer K, unearths a long-buried secret that has the potential to plunge what’s left of society into chaos. K’s discovery leads him on a quest to find Rick Deckard, a former LAPD blade runner who has been missing for 30 years.", "https://m.media-amazon.com/images/M/MV5BNzA1Njg4NzYxOV5BMl5BanBnXkFtZTgwODk5NjU3MzI@._V1_.jpg", "https://www.youtube.com/watch?v=gCcx85zbxz4", 80, 88, 81, 82);
		movieRepository.save(movie3);

		Movie movie4 = new Movie("Star Wars: Episode III - Revenge of the Sith", "Science Fiction, Adventure, Action", "George Lucas", "Hayden Christensen, Natalie Portman, Ewan McGregor", "2h 20m", "The saga is complete. <br> The evil Darth Sidious enacts his final plan for unlimited power – and the heroic Jedi Anakin Skywalker must choose a side.", "https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg", "https://www.youtube.com/watch?v=5UnjrG_N8hU", 76, 80, 80, 78);
		movieRepository.save(movie4);

		Movie movie5 = new Movie("La La Land", "Drama, Comedy, Music, Romance", "Damien Chazelle", "Ryan Gosling, Emma Stone, Rosemarie DeWitt", "2h 8m", "Sebastian (Ryan Gosling) and Mia (Emma Stone) are drawn together by their common desire to do what they love. But as success mounts they are faced with decisions that begin to fray the fragile fabric of their love affair, and the dreams they worked so hard to maintain in each other threaten to rip them apart.", "https://m.media-amazon.com/images/M/MV5BMzUzNDM2NzM2MV5BMl5BanBnXkFtZTgwNTM3NTg4OTE@._V1_.jpg", "https://www.youtube.com/watch?v=0pdqf4P9MB8", 80, 91, 94, 82);
		movieRepository.save(movie5);

		Movie movie6 = new Movie("Spider-Man: Across the Spider-Verse", "Animation, Adventure, Science Fiction, Action", "Joaquim Dos Santos, Kemp Powers, Justin K. Thompson", "Shameik Moore, Hailee Steinfeld, Brian Tyree Henry", "2h 20m", "After reuniting with Gwen Stacy, Brooklyn’s full-time, friendly neighborhood Spider-Man is catapulted across the Multiverse, where he encounters the Spider Society, a team of Spider-People charged with protecting the Multiverse’s very existence. But when the heroes clash on how to handle a new threat, Miles finds himself pitted against the other Spiders and must set out on his own to save those he loves most.", "https://m.media-amazon.com/images/I/919p74MDUEL._AC_UF1000,1000_QL80_.jpg", "https://www.youtube.com/watch?v=cqGjhVJWtEg", 86, 95, 86, 88);
		movieRepository.save(movie6);

		Movie movie7 = new Movie("Pirates of the Caribbean: The Curse of the Black Pearl", "Fantasy, Adventure, Action", "Gore Verbinski", "Johnny Depp, Keira Knightley, Orlando Bloom, Geoffrey Rush", "2h 23m", "After Port Royal is attacked and pillaged by a mysterious pirate crew, capturing the governor’s daughter Elizabeth Swann in the process, William Turner asks free-willing pirate Jack Sparrow to help him locate the crew’s ship—The Black Pearl—so that he can rescue the woman he loves.", "https://m.media-amazon.com/images/I/916kucr5MCS.jpg", "https://www.youtube.com/watch?v=naQr0uTrH_s", 81, 79, 84, 78);
		movieRepository.save(movie7);

		Movie movie8 = new Movie("The Batman", "Crime, Mystery, Thriller", "Matt Reeves", "Robert Pattinson, Zoë Kravitz, Paul Dano, Colin Farrell", "2h 56m", "In his second year of fighting crime, Batman uncovers corruption in Gotham City that connects to his own family while facing a serial killer known as the Riddler.", "https://m.media-amazon.com/images/M/MV5BZDQyNDc3ZjEtNDI4MS00NGRjLWE2NGQtZmYwN2NjNzk0ZjI1XkEyXkFqcGc@._V1_.jpg", "https://www.youtube.com/watch?v=NLOp_6uPccQ&t", 78, 85, 79, 80);
		movieRepository.save(movie8);

		Movie movie9 = new Movie("Harry Potter and the Deathly Hallows: Part 1", "Fantasy, Adventure", "David Yates", "Daniel Radcliffe, Emma Watson, Rupert Grint", "2h 26m", "Harry, Ron and Hermione walk away from their last year at Hogwarts to find and destroy the remaining Horcruxes, putting an end to Voldemort’s bid for immortality. But with Harry’s beloved Dumbledore dead and Voldemort’s unscrupulous Death Eaters on the loose, the world is more dangerous than ever.", "https://m.media-amazon.com/images/M/MV5BMTQ2OTE1Mjk0N15BMl5BanBnXkFtZTcwODE3MDAwNA@@._V1_.jpg", "https://www.youtube.com/watch?v=Su1LOpjvdZ4", 77, 85, 76, 74);
		movieRepository.save(movie9);

		Movie movie10 = new Movie("Oppenheimer", "History, Drama", "Christopher Nolan", "Cillian Murphy, Emily Blunt, Robert Downey Jr., Matt Damon, Florence Pugh", "3h", "A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bombs that brought an end to World War II.", "https://m.media-amazon.com/images/M/MV5BN2JkMDc5MGQtZjg3YS00NmFiLWIyZmQtZTJmNTM5MjVmYTQ4XkEyXkFqcGc@._V1_.jpg", "https://www.youtube.com/watch?v=uYPbbksJxIg", 83, 93, 90, 84);
		movieRepository.save(movie10);
	}
	
	//get home page
	@GetMapping("home")
	public String displayHomePage(HttpSession session, Model model) {
		
	    User loggedInUser = (User) session.getAttribute("loggedInUser");

	    if (loggedInUser != null) {
	    	
	        model.addAttribute("loggedInUser", loggedInUser);
	    }
		
		if (movieRepository.count() == 0) {
			
			insertMovies();
		}
		
	    List<Movie> movies = movieRepository.findAll();
	    
        if (!movies.isEmpty()) {
        	
    	    for (int i = 0; i <= 9; i++) {
    	    	
    	        model.addAttribute("movie" + (i + 1) + "Poster", movieRepository.findAll().get(i).getPoster());
    	        model.addAttribute("movie" + (i + 1) + "Id", movieRepository.findAll().get(i).getId());
    	    }
        }
		
		return "home";
	}
	
	//get about page
	@GetMapping("about")
	public String getAbout(HttpSession session, Model model) {
		
	    User loggedInUser = (User) session.getAttribute("loggedInUser");

	    if (loggedInUser != null) {
	    	
	        model.addAttribute("loggedInUser", loggedInUser);
	    }
		
		return "about";
	}
	
	//get select movie page
	@GetMapping("select-movie")
	public String movieSelection(HttpSession session, Model model) {
		
		User loggedInUser = (User)session.getAttribute("loggedInUser");
		model.addAttribute("loggedInUser", loggedInUser);
		
	    for (int i = 0; i <= 9; i++) {
	        model.addAttribute("movie" + (i + 1) + "Poster", movieRepository.findAll().get(i).getPoster());
	        model.addAttribute("movie" + (i + 1) + "Name", movieRepository.findAll().get(i).getName());
	        model.addAttribute("movie" + (i + 1) + "Id", movieRepository.findAll().get(i).getId());
	    }
		
		return "select-movie";
	}
	
	//get movie details page
	@GetMapping("movie-details")
	public String getMovieDetails(HttpSession session, Model model) {
		
		User loggedInUser = (User)session.getAttribute("loggedInUser");
		model.addAttribute("loggedInUser", loggedInUser);
		
	    for (int i = 0; i <= 9; i++) {
	        model.addAttribute("movie" + (i + 1) + "Poster", movieRepository.findAll().get(i).getPoster());
	        model.addAttribute("movie" + (i + 1) + "Name", movieRepository.findAll().get(i).getName());
	        model.addAttribute("movie" + (i + 1) + "Id", movieRepository.findAll().get(i).getId());
	        model.addAttribute("movie" + (i + 1) + "Genre", movieRepository.findAll().get(i).getGenre());
	        model.addAttribute("movie" + (i + 1) + "Director", movieRepository.findAll().get(i).getDirector());
	        model.addAttribute("movie" + (i + 1) + "Cast", movieRepository.findAll().get(i).getCast());
	        model.addAttribute("movie" + (i + 1) + "Duration", movieRepository.findAll().get(i).getDuration());
	        model.addAttribute("movie" + (i + 1) + "Trailer", movieRepository.findAll().get(i).getTrailer());
	        model.addAttribute("movie" + (i + 1) + "Summary", movieRepository.findAll().get(i).getSummary());
	        model.addAttribute("movie" + (i + 1) + "RatingImdb", movieRepository.findAll().get(i).getRating_imdb());
	        model.addAttribute("movie" + (i + 1) + "RatingRotten", movieRepository.findAll().get(i).getRating_rottenTomatoes());
	        model.addAttribute("movie" + (i + 1) + "RatingMeta", movieRepository.findAll().get(i).getRating_metacritic());
	        model.addAttribute("movie" + (i + 1) + "RatingLetter", movieRepository.findAll().get(i).getRating_letterboxd());
	    }
		
		return "movie-details";
	}
		
	//get register page
	@GetMapping("register") 
	public String displayRegisterPage(HttpSession session, Model model, User user){
		
	    User loggedInUser = (User) session.getAttribute("loggedInUser");

	    if (loggedInUser != null) {
	    	
	        model.addAttribute("loggedInUser", loggedInUser);
		    
		    return "redirect:/movietheater/home";
	    } else {
	    
	    	return "register";
	    }
	}
	
	//post register page
	@PostMapping("register") 
	public String registerUser(
			@ModelAttribute User user,
			@RequestParam(value = "confirmPassword", required = true) String passwordConfirm,
			Model model){
		
		String nameEmptyError = null, emailEmptyError = null, emailExistError = null, passwordEmptyError = null, passwordConfirmEmptyError = null, passwordMatchError = null, passwordLengthError = null;

		//confirm name
		if (user.getName() == null || user.getName().isEmpty()) {
			
		    nameEmptyError = "Name is required";
		    model.addAttribute("nameEmptyError", nameEmptyError);
		}
		//confirm email
		if (user.getEmail() == null || user.getEmail().isEmpty()) {
			
		    emailEmptyError = "Email is required";
		    model.addAttribute("emailEmptyError", emailEmptyError);
		} else if (userRepository.findByEmail(user.getEmail()) != null) {
			
			emailExistError = "Email already exists";
			model.addAttribute("emailExistError", emailExistError);
		}
		//confirm password
		if (passwordConfirm == null || passwordConfirm.isEmpty()) {
			
			passwordConfirmEmptyError = "Please confirm your password";
			model.addAttribute("passwordConfirmEmptyError", passwordConfirmEmptyError);
		}

		if (user.getPassword() == null || user.getPassword().isEmpty()) {
			
		    passwordEmptyError = "Password is required";
		    model.addAttribute("passwordEmptyError", passwordEmptyError);
		} else if (!passwordConfirm.equals(user.getPassword()) && passwordConfirmEmptyError == null) {
			
			passwordMatchError = "Passwords don't match";
			model.addAttribute("passwordMatchError", passwordMatchError);
		} else if (user.getPassword().length() < 8) {
			
			passwordLengthError = "Password must be at least 8 characters";
			model.addAttribute("passwordLengthError", passwordLengthError);
		}
		
	    model.addAttribute("nameEmptyError", nameEmptyError != null ? nameEmptyError : "");
	    model.addAttribute("emailEmptyError", emailEmptyError != null ? emailEmptyError : "");
	    model.addAttribute("emailExistError", emailExistError != null ? emailExistError : "");
	    model.addAttribute("passwordEmptyError", passwordEmptyError != null ? passwordEmptyError : "");
	    model.addAttribute("passwordConfirmEmptyError", passwordConfirmEmptyError != null ? passwordConfirmEmptyError : "");
	    model.addAttribute("passwordMatchError", passwordMatchError != null ? passwordMatchError : "");
	    model.addAttribute("passwordLengthError", passwordLengthError != null ? passwordLengthError : "");
		
	    //save user
		if (!user.getName().isEmpty() && !user.getEmail().isEmpty() && !user.getPassword().isEmpty() &&
				emailExistError == null && passwordMatchError == null && passwordConfirmEmptyError == null && passwordLengthError == null) {
			
			userRepository.save(user);
			
			model.addAttribute("registerSuccess", "You have successfully created your account.");
			
			return "login";
		} else {
			
			return "register";
		}
	}
	
	//get login page
	@GetMapping("login") 
	public String displayLoginPage(HttpSession session, Model model, User user){
		
	    User loggedInUser = (User) session.getAttribute("loggedInUser");

	    if (loggedInUser != null) {
	    	
	        model.addAttribute("loggedInUser", loggedInUser);
		    
		    return "redirect:/movietheater/home";
	    } else {
	    	
	    	return "login";
	    }
	}
	
	//post login page
	@PostMapping("login") 
	public String processLoginPage(
			@RequestParam(value = "email", required = false) String email,
            @RequestParam(value = "password", required = false) String password,
            HttpSession session,
            RedirectAttributes redirectAttributes,
            Model model) {
		
		String emailEmptyError = null, passwordEmptyError = null;
		
		if (email.equals("")) {
			
			emailEmptyError = "Email is required";
			model.addAttribute("emailEmptyError", emailEmptyError);
		}
		
		if (password.equals("")) {
			
			passwordEmptyError = "Password is required";
			model.addAttribute("passwordEmptyError", passwordEmptyError);
		}
		
	    model.addAttribute("emailEmptyError", emailEmptyError != null ? emailEmptyError : "");
	    model.addAttribute("passwordEmptyError", passwordEmptyError != null ? passwordEmptyError : "");
		
	    if (emailEmptyError == null && passwordEmptyError == null) {
	    	
			User user = userRepository.findByEmail(email);
			
		    if (user != null && user.getPassword().equals(password)) {
		    	
		    	session.setAttribute("loggedInUser", user);
		
		        redirectAttributes.addFlashAttribute("loginSuccess", "You have successfully logged in.");
		        return "redirect:/movietheater/home";
		        
		    } else {
			    
		    	model.addAttribute("dataError", "Wrong email or password");
				return "login";
		    } 
	    }
	    
	    return "login";
	}
	
	//logout
	@GetMapping("logout")
	public String logout(HttpSession session, RedirectAttributes redirectAttributes) {
		
	    session.invalidate();
	    redirectAttributes.addFlashAttribute("logoutSuccess", "You have successfully logged out.");
	    
	    return "redirect:/movietheater/home";
	}
	
	//get book ticket page
	@GetMapping("book-ticket")
	public String getBookTicketPage(HttpSession session) {
		
		User loggedInUser = (User)session.getAttribute("loggedInUser");
		
		if (loggedInUser != null) {
		
			return "redirect:/movietheater/select-movie";
		} else {
			
			return "login";
		}
	}
		
	//post book ticket page
	@PostMapping("book-ticket") 
	public String processBookTicketPage(
			@RequestParam(value = "selected_date", required = false) String selectedDate,
            @RequestParam(value = "selected_seans", required = false) String selectedSeans,
            @RequestParam(value = "selected_movie_name", required = false) String selectedMovie,
            @RequestParam(value = "movie_id", required = false) Long selectedMovieId,
            HttpSession session,
            Model model) {
		
		User loggedInUser = (User)session.getAttribute("loggedInUser");
		
		if (loggedInUser != null) {
			
			model.addAttribute("loggedInUser", loggedInUser);
			
			Movie movie = movieRepository.findById(selectedMovieId).get();
			
	        model.addAttribute("selectedMovie", movie.getName());
	        model.addAttribute("selectedMovieId", movie.getId());
	        
			model.addAttribute("today", today);
			model.addAttribute("tomorrow", tomorrow);
			model.addAttribute("dayAfterTomorrow", dayAfterTomorrow);
	        model.addAttribute("selectedDate", null);
	        model.addAttribute("selectedSeans", null);
	        
	        if (selectedDate != null) {
	            model.addAttribute("selectedDate", selectedDate);
	        } else {
	            model.addAttribute("selectedDate", null);
	        }
	        
	        if (selectedSeans != null) {
	            model.addAttribute("selectedSeans", selectedSeans);
	        } else {
	            model.addAttribute("selectedSeans", null);
	        }
	        
	        //create seat grid
	        int rows = 9;
	        int cols = 16;
	        int[][] seats = new int[rows][cols];
	        
	        for (int i = 0; i < rows; i++) {
	        	
	            for (int j = 0; j < cols; j++) {
	            	
	                seats[i][j] = 1;
	            }
	        }
	        
	        //check if a seat is taken
	        for (Ticket ticket : ticketRepository.findAll()) {
	        	
	            if (ticket.getMovieName().equals(selectedMovie) && ticket.getDate().equals(selectedDate) && ticket.getSeance().equals(selectedSeans)) {
	                    
	                    Long seatNumber = ticket.getSeat();
	                    int row = (int)((seatNumber - 1) / cols);
	                    int col = (int)((seatNumber - 1) % cols);
	                    
	                    seats[row][col] = 0;
	                }
	        }

	        //post the seats
	        List<List<Map<String, Object>>> seatRows = new ArrayList<>();
	        int seatNo = 1;
	        
	        for (int i = 0; i < rows; i++) {
	        	
	            List<Map<String, Object>> row = new ArrayList<>();
	            
	            for (int j = 0; j < cols; j++) {
	            	
	                Map<String, Object> seat = new HashMap<>();
	                
	                seat.put("id", seatNo++);
	                seat.put("number", seatNo - 1);
	                seat.put("available", seats[i][j] == 1);
	                
	                row.add(seat);
	            }
	            
	            seatRows.add(row);
	        }
	        model.addAttribute("seats", seatRows);
	        			
			return "book-ticket";
		} else {
			
			return "login";
		}
	}
	
	//get confirm ticket page
	@GetMapping("confirm-ticket")
	public String confirmTicket(HttpSession session, Model model) {
		
	    User loggedInUser = (User)session.getAttribute("loggedInUser");
	    model.addAttribute("loggedInUser", loggedInUser);
	    	
	    return "redirect:/movietheater/home";
	}
	
	//post confirm ticket page
	@PostMapping("confirm-ticket")
	public String postConfirmTicket(			
			@RequestParam(value = "selected_date", required = false) String selectedDate,
            @RequestParam(value = "selected_seans", required = false) String selectedSeance,
            @RequestParam(value = "selected_movie_name", required = false) String selectedMovie,
            @RequestParam(value = "movie_id", required = false) Long selectedMovieId,
            @RequestParam(value = "seatId", required = false) Long seatId,
            @RequestParam(value = "confirm", required = false) String confirm,
            HttpSession session,
            RedirectAttributes redirectAttributes,
            Model model) {
		
	    User loggedInUser = (User)session.getAttribute("loggedInUser");
	    model.addAttribute("loggedInUser", loggedInUser);

	    model.addAttribute("selectedDate", selectedDate);
	    model.addAttribute("selectedSeans", selectedSeance);
	    model.addAttribute("selectedMovie", selectedMovie);	
	    model.addAttribute("saloon", selectedMovieId);	
	    model.addAttribute("seat", seatId);	
	    
	    if (confirm != null) {
	    	
	        if (seatId != null) {
	        	
	        	Movie movie = movieRepository.findById(selectedMovieId).get();
	        	String username = loggedInUser.getName();
	        	Long userId = loggedInUser.getId();
	        	
	            Ticket ticket = new Ticket(selectedDate, selectedSeance, selectedMovie, username, seatId, selectedMovieId, userId, loggedInUser, movie);
	            ticketRepository.save(ticket);
	            	            
	            User user = userRepository.findByEmail(loggedInUser.getEmail());
	            session.setAttribute("loggedInUser", user);
	            
		    	redirectAttributes.addFlashAttribute("ticketBooked", "You have successfully booked your ticket.");
	            return "redirect:/movietheater/my-tickets";
	        }
	    }
	    
	    return "confirm-ticket";
	}
	
	//get my tickets page
	@GetMapping("my-tickets")
	public String displayTickets(HttpSession session, Model model) {
		
	    User loggedInUser = (User)session.getAttribute("loggedInUser");
	    
        User user = userRepository.findByEmail(loggedInUser.getEmail());
        session.setAttribute("loggedInUser", user);

	    if (user == null) {

	    	model.addAttribute("loggedInUser", user);
	    	
		    return "redirect:/movietheater/login";
		    
	    } else {
	    
	    	model.addAttribute("loggedInUser", user);
	    
	    	List<Ticket> tickets = user.getTickets();
	        model.addAttribute("tickets", tickets);
	        model.addAttribute("hasTickets", !user.getTickets().isEmpty());
	    	
	    	return "my-tickets";
	    }
	}
	
	//post my tickets page
	@PostMapping("my-tickets")
	public String deleteTicket(@RequestParam(value = "ticketId", required = false) Long ticketId, HttpSession session, RedirectAttributes redirectAttributes, Model model) {
		
	    User loggedInUser = (User)session.getAttribute("loggedInUser");
        User user = userRepository.findByEmail(loggedInUser.getEmail());
        session.setAttribute("loggedInUser", user);

	    if (user == null) {

	    	model.addAttribute("loggedInUser", user);
	    	
		    return "redirect:/movietheater/login";
		    
	    } else {
	    
	    	model.addAttribute("loggedInUser", user);
	    
	    	if (ticketId != null) {
	    			    		
	    		Ticket ticket = ticketRepository.findById(ticketId).get();
	    		
	            if (ticket.getUser() != null) {
	            	
	                ticket.getUser().getTickets().remove(ticket);
	            }
	            
	            if (ticket.getMovie() != null) {
	            	
	                ticket.getMovie().getTickets().remove(ticket);
	            }

	            ticket.setUser(null);
	            ticket.setMovie(null);
	            ticketRepository.save(ticket);

	            ticketRepository.deleteById(ticketId);
		    	
		        List<Ticket> tickets = user.getTickets();
		        model.addAttribute("tickets", tickets);
		        model.addAttribute("hasTickets", !tickets.isEmpty());
		    	
		    	redirectAttributes.addFlashAttribute("ticketDeleted", "You have successfully canceled your ticket.");
		    	return "redirect:/movietheater/my-tickets";
	    	}
	    		    	
	    	return "redirect:/movietheater/my-tickets";
	    }
	}
}